<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8"/>
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/styles.css")); ?>" />

    <?php echo $__env->yieldContent('head'); ?>
    <script src="<?php echo e(asset("assets/scripts/topLoadedScripts.js")); ?>" type="text/javascript"></script>
</head>
<body>

    <?php echo $__env->yieldContent('body'); ?>
    <footer>&nbsp;</footer>

    <script src="<?php echo e(asset("assets/scripts/frontend.js")); ?>" type="text/javascript"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108549327-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-108549327-1');
    </script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter46392297 = new Ya.Metrika({
                        id:46392297,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                    s = d.createElement("script"),
                    f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/46392297" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

</body>
</html>
