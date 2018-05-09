(function($) {
	var connum = $(".count-number")
	connum.appear(function() {
		var $this = $(this);
		$this.each(function() {
			datacount = $this.attr('data-count');
			$this.find('.counter').delay(6000).countTo({
				from: 10,
				to: datacount,
				speed: 3000,
				refreshInterval: 50,
			});
		});
	});
})(jQuery); 
		