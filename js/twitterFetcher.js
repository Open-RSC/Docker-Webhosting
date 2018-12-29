/*********************************************************************
 *  #### Twitter Post Fetcher v18.0.3 ####
 *  Coded by Jason Mayes 2015. A present to all the developers out there.
 *  www.jasonmayes.com
 *  Please keep this disclaimer with my code if you use it. Thanks. :-)
 *  Got feedback or questions, ask here:
 *  http://www.jasonmayes.com/projects/twitterApi/
 *  Github: https://github.com/jasonmayes/Twitter-Post-Fetcher
 *  Updates will be posted to this site.
 *********************************************************************/
(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define([], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory();
    } else {
        factory();
    }
}(this, function () {
    var domNode = '';
    var maxTweets = 20;
    var queue = [];
    var inProgress = false;
    var printTime = true;
    var formatterFunction = null;
    var supportsClassName = true;
    var showRts = true;
    var customCallbackFunction = null;
    var showImages = false;
    var lang = 'en';
    var dataOnly = false;
    var script = null;

    function handleTweets(tweets) {
        if (customCallbackFunction === null) {
            var x = tweets.length;
            var n = 0;
            var element = document.getElementById(domNode);
            var html = '<ul>';
            while (n < x) {
                html += '<li>' + tweets[n] + '</li>';
                n++;
            }
            html += '</ul>';
            element.innerHTML = html;
        } else {
            customCallbackFunction(tweets);
        }
    }

    function strip(data) {
        return data.replace(/<b[^>]*>(.*?)<\/b>/gi, function (a, s) {
            return s;
        })
            .replace(/class="(?!(tco-hidden|tco-display|tco-ellipsis))+.*?"|data-query-source=".*?"|dir=".*?"|rel=".*?"/gi,
                '');
    }

    function getElementsByClassName(node, classname) {
        var a = [];
        var regex = new RegExp('(^| )' + classname + '( |$)');
        var elems = node.getElementsByTagName('*');
        for (var i = 0, j = elems.length; i < j; i++) {
            if (regex.test(elems[i].className)) {
                a.push(elems[i]);
            }
        }
        return a;
    }

    var twitterFetcher = {
        fetch: function (config) {
            if (config.maxTweets === undefined) {
                config.maxTweets = 5;
            }
            if (config.showTime === undefined) {
                config.showTime = true;
            }
            if (config.dateFunction === undefined) {
                config.dateFunction = 'default';
            }
            if (config.customCallback === undefined) {
                config.customCallback = null;
            }
            if (config.showImages === undefined) {
                config.showImages = true;
            }

            if (inProgress) {
                queue.push(config);
            } else {
                inProgress = true;
                domNode = config.domId;
                maxTweets = config.maxTweets;
                printTime = config.showTime;
                formatterFunction = config.dateFunction;
                customCallbackFunction = config.customCallback;
                dataOnly = config.dataOnly;

                var head = document.getElementsByTagName('head')[0];
                if (script !== null) {
                    head.removeChild(script);
                }
                script = document.createElement('script');
                script.type = 'text/javascript';
                if (config.list !== undefined) {
                    script.src = 'https://syndication.twitter.com/timeline/list?' +
                        'callback=__twttrf.callback&dnt=false&list_slug=' +
                        config.list.listSlug + '&screen_name=' + config.list.screenName +
                        '&suppress_response_codes=true&lang=' + (config.lang || lang) +
                        '&rnd=' + Math.random();
                } else if (config.profile !== undefined) {
                    script.src = 'https://syndication.twitter.com/timeline/profile?' +
                        'callback=__twttrf.callback&dnt=false' +
                        '&screen_name=' + config.profile.screenName +
                        '&suppress_response_codes=true&lang=' + (config.lang || lang) +
                        '&rnd=' + Math.random();
                } else {
                    script.src = 'https://cdn.syndication.twimg.com/widgets/timelines/' +
                        config.id + '?&lang=' + (config.lang || lang) +
                        '&callback=__twttrf.callback&' +
                        'suppress_response_codes=true&rnd=' + Math.random();
                }
                head.appendChild(script);
            }
        },
        callback: function (data) {
            if (data === undefined || data.body === undefined) {
                inProgress = false;

                if (queue.length > 0) {
                    twitterFetcher.fetch(queue[0]);
                    queue.splice(0, 1);
                }
                return;
            }

            var div = document.createElement('div');
            div.innerHTML = data.body;
            if (typeof (div.getElementsByClassName) === 'undefined') {
                supportsClassName = false;
            }

            var tweets = [];
            var times = [];
            var rts = [];
            var x = 0;

            if (supportsClassName) {
                var tmp = div.getElementsByClassName('timeline-Tweet');
                while (x < tmp.length) {
                    if (tmp[x].getElementsByClassName('timeline-Tweet-retweetCredit').length > 0) {
                        rts.push(true);
                    } else {
                        rts.push(false);
                    }
                    if (!rts[x] || rts[x] && showRts) {
                        tweets.push(tmp[x].getElementsByClassName('timeline-Tweet-text')[0]);
                        times.push(tmp[x].getElementsByClassName('dt-updated')[0]);
                    }
                    x++;
                }
            } else {
                var tmp = getElementsByClassName(div, 'timeline-Tweet');
                while (x < tmp.length) {
                    if (!rts[x] || rts[x] && showRts) {
                        tweets.push(getElementsByClassName(tmp[x], 'timeline-Tweet-text')[0]);
                        times.push(getElementsByClassName(tmp[x], 'dt-updated')[0]);
                    }
                    x++;
                }
            }

            if (tweets.length > maxTweets) {
                tweets.splice(maxTweets, (tweets.length - maxTweets));
                times.splice(maxTweets, (times.length - maxTweets));
            }

            var arrayTweets = [];
            var x = tweets.length;
            var n = 0;

            while (n < x) {
                var op = '';
                op += '<span class="text-info timePosted"><b>' + times[n].textContent + '</b></span>';
                op += '<span class="tweet">' + tweets[n].textContent + '</span>';
                op += '<br><br><div class="border-top border-info"></div><br>';
                arrayTweets.push(op);
                n++;
            }

            handleTweets(arrayTweets);
            inProgress = false;

            if (queue.length > 0) {
                twitterFetcher.fetch(queue[0]);
                queue.splice(0, 1);
            }
        }
    };

    // It must be a global variable because it will be called by JSONP.
    window.__twttrf = twitterFetcher;
    window.twitterFetcher = twitterFetcher;
    return twitterFetcher;
}));

var configProfile = {
    "profile": {"screenName": 'openrsc'},
    "domId": 'tweets',
    "maxTweets": 10,
    "showTime": true,
    "lang": 'en'
};
twitterFetcher.fetch(configProfile);
