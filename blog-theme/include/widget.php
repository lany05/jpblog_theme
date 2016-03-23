<?php
/**
 * Created by PhpStorm.
 * User: davidkrisnasaputra
 * Date: 3/22/16
 * Time: 11:13 AM
 */?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="widget-area">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-7 p-lr">
                <div class="social-widget">
                    <div class="widget-title twitter">
                        Find Us on Twitter
                    </div>
                    <div class="widget-slider">
                      <div id="twitter-feed"></div>
                    </div>
                    <a href="http://twitter.com/jobplanetid/" target="_blank" class="btn btn-twitter"><i class="fa fa-twitter"></i> Follow @JobplanetID</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 p-lr">
                <div class="social-widget disabled-border">
                    <div class="widget-title facebook">
                        JobplanetID on Facebook
                    </div>
                    <div class="widget-slider">
                        <div class="fb-page" data-href="https://www.facebook.com/jobplanetid" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/jobplanetid"><a href="https://www.facebook.com/jobplanetid">Jobplanet Indonesia</a></blockquote></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
