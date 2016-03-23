jQuery(document).ready(function($) {

	var shareBox = {
		num_share: 0,
		fbLoaded: false,
		regShare: function(elm) {
			shareBox.addShare(elm);
			return false;
		},
		windowOptions: "scrollbars=yes,resizable=yes,toolbar=no,location=yes",
		facebook: function(data) {
			var _url = 'http://www.facebook.com/share.php?u=|u|';
			_url = _url.replace('|u|', data.pageUrl).replace('|t|', data.pageTitle).replace('|d|', data.pageDesc).replace('|140|', data.pageTitle.substring(0, 130));
			window.open(_url, shareBox.windowOptions, 'width=640, height=528');
		},
		twitter: function(data) {
			var twAPI = "https://twitter.com/intent/tweet",
				title = encodeURIComponent(data.pageTitle),
				url = encodeURIComponent(data.pageUrl);

			window.open(twAPI + "?text=" + title + "&url=" + url,
				shareBox.windowOptions, "width=550,height=320"
			);
		},
		linkedin: function(data) {
			var inAPI = "http://www.linkedin.com/shareArticle",
				title = encodeURIComponent(data.pageTitle),
				url = encodeURIComponent(data.pageUrl),
				desc = encodeURIComponent(data.pageDesc),
				source = "Jobplanet Indonesia";

			window.open(inAPI + "?mini=true&title=" + title + "&url=" + encodeURIComponent(url) + "&summary=" + desc + "&source=" + source,
				shareBox.windowOptions, "width=550,height=320"
			);
		},
		gplus: function(data) {
			var _url = 'https://plusone.google.com/_/+1/confirm?url=' + encodeURIComponent(data.pageUrl) + '&title=' + encodeURIComponent(data.pageTitle);
			window.open(_url, shareBox.windowOptions, 'width=640, height=528');
		},
		fb_copy: function(data) {
			var obj = {
				method: 'feed',
				display: 'popup',
				link: data.pageUrl,
				picture: data.pageImage,
				name: data.pageTitle,
				// caption: data.pageDesc,
				caption: data.pageUrl,
				description: '',
			};
			FB.ui(obj);
		},
		addShare: function(elm) {
			var url_ex = $(elm).attr('data-url');
			if (url_ex.substr(0, 2) == '//')
				url_ex = 'http:' + url_ex;

			var data = {
				pageUrl: $(elm).attr('data-url'),
				pageTitle: $(elm).attr('data-title'),
				pageDesc: $(elm).attr('data-desc'),
				pageImage: $(elm).attr('data-image')
			}
			if (!data.pageImage) {
				data.pageImage = 'https://jpassetsid.jobplanet.com/assets/global/d/id-id/about_us-ced652def319a28d6c9c849fde514917.jpg';
			}

			if ($(elm).attr('class') == 'share fb') {
				shareBox.fb_copy(data);
			} else if ($(elm).attr('class') == 'share tw') {
				shareBox.twitter(data);
			} else if ($(elm).attr('class') == 'share gp') {
				shareBox.gplus(data);
			} else if ($(elm).attr('class') == 'share in') {
				shareBox.linkedin(data);
			}

			return false;
		},
		addCounter: function(elm) {
			var url_ex = $(elm).attr('data-url');
			if (url_ex.substr(0, 1) == '//')
				url_ex = 'http:' + url_ex;

			var data = {
				pageUrl: url_ex,
				pageTitle: $(elm).attr('data-title'),
				pageDesc: $(elm).attr('data-desc'),
				pageImage: $(elm).attr('data-image')
			}

			if ($(elm).hasClass('fb')) {
				shareBox.countFB(elm);
				$(elm).click(function(e) {
					shareBox.fb_copy(data);
					e.preventDefault();
				});
			} else if ($(elm).hasClass('tw')) {
				shareBox.countTW(elm);
				$(elm).click(function(e) {
					shareBox.twitter(data);
					e.preventDefault();
				});
			} else if ($(elm).hasClass('gplus')) {
				shareBox.countGplus(elm);
				$(elm).click(function(e) {
					shareBox.gplus(data);
					e.preventDefault();
				});
			}
		},
		countFB: function(elm) {
			var pageUrl = $(elm).attr('data-url');
			FB.api({
				method: 'fql.query',
				query: 'SELECT share_count FROM link_stat WHERE url = "' + pageUrl + '"'
			}, function(data) {
				$(elm).find('span').html(data[0].share_count);

				// update total share
				var total_share = $(elm).closest('.share_top').find('.total-share');
				if (typeof $(total_share) !== 'undefined') {
					//var num = $(total_share).find('span').html();
					num = parseInt(total_share) + parseInt(data[0].share_count);
					$(total_share).html(num);
				}
			});
		},
		countTW: function(elm) {
			var pageUrl = $(elm).attr('data-url');
			var tweets;
			$.getJSON('http://urls.api.twitter.com/1/urls/count.json?url=' + pageUrl + '&callback=?', function(data) {
				tweets = data.count;
				$(elm).find('span').html(tweets);

				// update total share
				var total_share = $(elm).closest('.share-count').find('.total-share');
				if (typeof $(total_share) !== 'undefined') {
					//var num = $(total_share).find('span').html();
					num = parseInt(total_share) + parseInt(tweets);
					$(total_share).html(num);
				}
			});
		},
		countGplus: function(elm) {
			var pageUrl = $(elm).attr('data-url');
			var api_url = baseurl + '//share?url=' + pageUrl;

			$.ajax({
				url: api_url,
				dataType: 'json',
				contentType: 'application/json',
				type: 'GET',
				processData: false,
				success: function(data) {
					var google_pluses = data;
					$(elm).find('span').html(google_pluses);
					// update total share
					var total_share = $(elm).closest('.share-count').find('.total-share');
					if (typeof $(total_share) !== 'undefined') {
						//var num = $(total_share).find('span').html();
						num = parseInt(total_share) + parseInt(google_pluses);
						$(total_share).html(num);
					}
				}
			})
		},
		run : function(elm) {
			//shareBox.addCounter(cshare)
		},
		includeFb: function() {
			window.fbAsyncInit = function() {
				FB.init({
					appId: '1644046675828466',
					xfbml: true,
					version: 'v2.3'
				});
			};

			(function(d, s, id) {
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {
					return;
				}
				js = d.createElement(s);
				js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		}
	};

	$( ".search-toggle" ).click(function() {
		$( ".search-input, .menu-item, .search-toggle" ).toggleClass('active');
	});

	$('#twitter-slider').owlCarousel({
		loop:true,
		margin:0,
		items:1,
		autoplay:true,
		smartSpeed:1500,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		dot:true
	});

	shareBox.includeFb();
	$('.share-article').find('a').click(function(e) {
		if ($(this).hasClass('noshare')) {
			var skip;
		} else {
			shareBox.addShare(this);
			e.preventDefault();
		}
	});
});