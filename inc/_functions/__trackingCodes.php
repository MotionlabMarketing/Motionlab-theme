<?php

function get_tracking_codes($location) {

    $content = "";

    // HEADER 
    if ($location == 'head' || $location == 'header'):

        if (!empty($gtm = get_field('google_tag_manager', 'option'))):
        $content .= "<!-- Google Tag Manager -->
                <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','GTM-{$gtm}?>');</script>
            <!-- End Google Tag Manager -->";
        endif;

        if (!empty($ga = get_field('google_analytics', 'option'))):
        $content .= "<!-- Google Analytics (gtag.js) -->
                <script async src='https://www.googletagmanager.com/gtag/js?id=UA-{$ga}'></script>
                <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'UA-{$ga}');
                </script>
            <!-- End Google Analytics (gtag.js) -->";
        endif;

        if (!empty($aw = get_field('google_ads_manager', 'option'))):
        $content .= "<!-- Google Ads -->
            <script async src='https://www.googletagmanager.com/gtag/js?id=AW-{$aw}'></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'AW-{$aw}}');
            </script>
            <!-- End Google Ads -->";
        endif;

        if (!empty($fb = get_field('google_ads_manager', 'option'))):
            $content .= "<!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '410282966011687'); 
            fbq('track', 'PageView');
            </script>
            <noscript>
            <img height='1' width='1' 
            src='https://www.facebook.com/tr?id=410282966011687&ev=PageView
            &noscript=1'/>
            </noscript>
            <!-- End Facebook Pixel Code -->";
        endif;
        
        if (!empty($rt = get_field('responce_tap_code', 'option'))):
            $content .= "<!-- VWO Start --><script type='text/javascript'>
                var adiInit = '{$rt}', adiRVO = true;
                var adiFunc = null;
                (function() {
                    var adiSrc = document.createElement('script'); adiSrc.type = 'text/javascript';
                    adiSrc.async = true;
                    adiSrc.src = ('https:' == document.location.protocol ? 'https://static-ssl' : 'http://static-cdn')
                        + '.responsetap.com/static/scripts/rTapTrack.min.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(adiSrc, s);
                })();
                </script><!-- End VWO Start -->/n".PHP_EOL;
        endif;

        if (!empty($vwo = get_field('vwo_tracking', 'option'))):
            $content .= "<!-- Start Visual Website Optimizer Asynchronous Code -->
                <script type='text/javascript'>
                var _vwo_code=(function(){
                var account_id={$vwo},
                settings_tolerance=2000,
                library_tolerance=2500,
                use_existing_jquery=false,
                /* DO NOT EDIT BELOW THIS LINE */
                f=false,d=document;return{use_existing_jquery:function(){return use_existing_jquery;},library_tolerance:function(){return library_tolerance;},finish:function(){if(!f){f=true;var a=d.getElementById('_vis_opt_path_hides');if(a)a.parentNode.removeChild(a);}},finished:function(){return f;},load:function(a){var b=d.createElement('script');b.src=a;b.type='text/javascript';b.innerText;b.onerror=function(){_vwo_code.finish();};d.getElementsByTagName('head')[0].appendChild(b);},init:function(){settings_timer=setTimeout('_vwo_code.finish()',settings_tolerance);var a=d.createElement('style'),b='body{opacity:0 !important;filter:alpha(opacity=0) !important;background:none !important;}',h=d.getElementsByTagName('head')[0];a.setAttribute('id','_vis_opt_path_hides');a.setAttribute('type','text/css');if(a.styleSheet)a.styleSheet.cssText=b;else a.appendChild(d.createTextNode(b));h.appendChild(a);this.load('//dev.visualwebsiteoptimizer.com/j.php?a='+account_id+'&u='+encodeURIComponent(d.URL)+'&r='+Math.random());return settings_timer;}};}());_vwo_settings_timer=_vwo_code.init();
                </script>
                <!-- End Visual Website Optimizer Asynchronous Code -->";
        endif;

    endif; 

    // BODY 
    if ($location == 'body'):
        
        if (!empty($gtm = get_field('google_tag_manager', 'option'))):
            $content .= "<!-- Google Tag Manager (noscript) -->
            <noscript><iframe src='https://www.googletagmanager.com/ns.html?id=GTM-{$gtm}'
            height='0' width='0' style='display:none;visibility:hidden'></iframe></noscript>
            <!-- End Google Tag Manager (noscript) -->";
        endif;

    endif;

	echo $content;
}
