setTimeout(function () { var bp= document.createElement('script');var s= document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(bp, s); }, 1000);  $(function () { $(".subNav").hide(); $(".navlist ul li").hover(function () { $(this).find(".subNav").stop(true, true); $(this).find(".subNav").slideDown(); }, function () { $(this).find(".subNav").stop(true, true); $(this).find(".subNav").slideUp(); }); })