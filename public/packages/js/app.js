var app = angular.module("link", ['ui.router', 'ngResource', 'infinite-scroll', 'monospaced.elastic']);

app.factory('Quote', function($resource) {
  return $resource(
    'quote',
    null,
    {
      'get': {
	'method': "GET",
	'params': {
	  'sp': '0'
	}
      },
      'show': {
        method: "GET",
        url: "quote/:id",
        params: {
          'id': '0'
        }
      }
    }
  );
});

app.service('QuoteService', function() {
  var quotes = [];
  var now = -1;

  var setQuotes = function(arr, i) {
    quotes = arr;
    now = i;
  };

  var getQuote = function() {
    return quotes[now];
  };

  var setNow = function(i) {
    if (i < 0 || i >= quotes.length) {
      return;
    }
    now = i;
  };

  var find = function(id) {
    for (var i=0; i<quotes.length; ++i) {
      if (quotes[i].id == id) {
        now = i;
        return now;
      }
    }
    return undefined;
  };

  var prev = function() {
    --now;
    if (now < 0) {
      ++now;
      return undefined;
    }
    return now;
  };

  var next = function() {
    ++now;
    if (now >= quotes.length) {
      --now;
      return undefined;
    }
    return now;
  };

  return {
    setQuotes: setQuotes,
    getQuote: getQuote,
    setNow: setNow,
    find: find,
    prev: prev,
    next: next
  };
});

// http://stackoverflow.com/questions/13882077/angularjs-passing-scope-between-routes
// http://thewaterbear.com/nested-animations-in-angularjs-using-ui-router/


app.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider
    .state('main', {
      url: '/',
      templateUrl: 'partials/main.html',
      controller: 'mainCtrl'
    })
    .state('post', {
      url: '/post',
      templateUrl: 'partials/post.html',
      controller: 'postCtrl'
    })
    .state('view', {
      url: '/view/:id',
      templateUrl: 'partials/view.html',
      controller: 'viewCtrl'
    });

  $urlRouterProvider.otherwise('/');
});

app.controller("mainCtrl", function($scope, Quote, $rootScope, $state, QuoteService) {
  $scope.sp = 0;
  $scope.nomore = false;
  $scope.loading = false;
  $scope.pack = [];

  $scope.$QuoteService = QuoteService;

  $scope.fetch = function() {
    if ($scope.nomore || $scope.loading) {
      return;
    }

    $rootScope.$broadcast('fetch-initiate');
    var quote = new Quote();
    quote.$get({'sp': $scope.sp})
      .then(function(response) {
	$scope.sp = response.sp;

        console.log(response);

	$scope.pack = $scope.pack.concat(response.quotes);
        $scope.$QuoteService.setQuotes($scope.pack, 0);

	$rootScope.$broadcast('fetch-done');

	if (response.quotes.length == 0) {
	  $rootScope.$broadcast('fetch-nomore');
	}
      })
      .catch(function(response) {
	$rootScope.$broadcast('fetch-fail');
      });
  };

  $scope.goToView = function(id) {
    $state.go('view', {id: id});
  };

  $scope.$on('fetch-initiate', function(e, data) {
    $scope.loading = true;
    console.log('fetch initiated');
  });

  $scope.$on('fetch-done', function(e, data) {
    $scope.loading = false;
    console.log('fetch done');
  });

  $scope.$on('fetch-fail', function(e, data) {
    console.log('fetch failed');
  });

  $scope.$on('fetch-nomore', function(e, data) {
    $scope.nomore = true;
    console.log('fetch nomore');
  });
});

app.controller("postCtrl", function($scope, Quote, $rootScope, $state) {
  $scope.disabled = false;

  $scope.quote = {
    'quote': '',
    'author': '',
    'image': ''
  };

  $scope.post = function() {
    $rootScope.$broadcast('post-start');

    var quote = new Quote($scope.quote);
    quote.$save()
      .then(function(response) {
	console.log(response);
        $scope.id = response.id;
	$rootScope.$broadcast('post-done');
      })
      .catch(function(response) {
	console.log(response);
	$rootScope.$broadcast('post-fail');
      });
  };

  $scope.$on('post-start', function(e, data) {
    $scope.disabled = true;
  });

  $scope.$on('post-done', function(e, data) {
    // done and go to see the detail
    $state.go('view', {id: $scope.id});
  });

  $scope.$on('post-fail', function(e, data) {
    // enable the input
    $scope.disabled = false;
    // display error
  });
});

app.controller("viewCtrl", function($scope, $rootScope, $stateParams, QuoteService, Quote) {
  console.log($stateParams);
  $scope.$QuoteService = QuoteService;
  var id = $stateParams.id;
  var now = $scope.$QuoteService.find(id);
  console.log(now);
  if (now === undefined) {
    // do a request
    var quote = new Quote();
    quote.$show({id: id})
      .then(function(response) {
        console.log(response);
        $scope.quote = response;
      })
      .catch(function(response) {
        console.log(response);
        $scope.quote = {
          'quote': "Whatever you are looking for, it is in another castle",
          'author': "developer",
          'image': 'res/404.jpg'
        };
      });
  } else {
    $scope.quote = $scope.$QuoteService.getQuote();
  }
});
