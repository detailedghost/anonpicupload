		</div>
	</body>
	<script type="text/javascript">

	$(document).ready(function(){
	    var fileloc = $('#generateMoreBtns');
	    fileloc.click(function(){
	    	$(this).before('<br/><input name="file[]" type="file" multiple="multiple"></input>');
	    });

	    //Changing the background of the universe div
	    var imageloc = 'img/1.png';
	    $('body').css({
	    	'background-image':'url(' + imageloc + ')', 
	    	'background-repeat': 'no-repeat',
	    	'background-position': 'center'
	    });

	});

	$(window).load(function(){

	});

	$(window).resize(function(){

	});

	</script>
</html>