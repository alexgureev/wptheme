</div>
<div id="sbar">
    <?php if (is_front_page()) {
        get_sidebar('home');
    } else {
        get_sidebar();
    }?>
</div>
<div id="foot">
    &copy; 2014 <b>База Рефератов</b><br>
    Все материалы данного ресурса находятся в открытом доступе.<br>
    Контент предназначен для ознакомительных целей, без коммерческого использования.<br>
    По любым вопросам можно написать нам через <a rel="nofollow" href="http://referat-baza.com/contact/">обратную связь</a>.
</div>
</div>
<script src="/social.js"></script>
<?php wp_footer(); ?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter26622834 = new Ya.Metrika({id:26622834,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/26622834" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-55735206-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>