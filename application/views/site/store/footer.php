<div id="dropDownSelect2"></div>
	
<!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo public_url('site/vendor') ?>/noui/nouislider.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript">
    	function number_format( number, decimals, dec_point, thousands_sep ) {
    
	    // * example 1: number_format(1234.5678, 2, '.', '');
	    // * returns 1: 1234.57
	                              
	    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
	    var d = dec_point == undefined ? "," : dec_point;
	    var t = thousands_sep == undefined ? "," : thousands_sep, s = n < 0 ? "-" : "";
	    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
	                              
	    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	    }

        /*[ No ui ]
        ===========================================================*/
        function filter500( value, type ){
			return value % 1000 ? 2 : 1;
		}
        var filterBar = document.getElementById('filter-bar');

        var total = parseInt(document.getElementById('value-upper').getAttribute("max"));
        noUiSlider.create(filterBar, {
            start: [ 0, total ],
            connect: true,
            step: 500000,
            range: {
                'min': 0,
                'max': total
        	}
        });

        var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper'),
        ];

        filterBar.noUiSlider.on('update', function( values, handle ) {
            skipValues[handle].innerHTML = number_format(Math.round(values[handle]),0) ;
        });
    </script>