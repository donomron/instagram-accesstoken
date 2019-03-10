var copyBnt = document.getElementById('copy');
var code = document.getElementById('code');
var tooltip = document.getElementById('tooltip');
copyBnt.addEventListener('click', onClick);

function onClick () {		
	code.select();
	document.execCommand("copy");	
	tooltip.classList.add('show');
	
	setTimeout(function() {
		tooltip.classList.remove('show');
	}, 1000);
}