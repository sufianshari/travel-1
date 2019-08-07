<div>
    {!!  $parse !!}
</div>
<script>
$(function(){
	$("#news a").each(function(){
		//console.log($(this));
		var link=$(this).attr('href');
		var link_arr=link.split('.');
		var name = $(this).text();
//		var link_real='https://news.google.com'+link_arr[1]+'?hl=en-US&gl=US&ceid=US%3Aen';
        var link_real = 'https://www.google.com/search?source=hp&ei=8rEQXJW5O8fwaODmpOgE&q='+name+'&btnK=%D0%9F%D0%BE%D0%B8%D1%81%D0%BA+%D0%B2+Google&oq='+name+'&gs_l=psy-ab.3..35i39j0i20i263j0i131j0i20i263j0l6.7525.8834..9171...0.0..0.158.615.0j5......0....1..gws-wiz.....6..0i10i1j0i67.1jWLf-K1u9Y';
		console.log(link_real);
		$(this).attr("href", link_real);
		$(this).attr("target","_blank");
	});
	$("menu").hide();
	$(".SVJrMe").hide();
	$(".qTydRe").hide();
	$(".DPvwYc").hide();
});
</script>