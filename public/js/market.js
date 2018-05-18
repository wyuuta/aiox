function onBuyChanged(){
	var amount = document.getElementById('jumlahbeli').value;
	var price = document.getElementById('hargabeli').value;
	console.log(amount);
	console.log(price);
	document.getElementById('biyabeli').value = parseFloat(amount)*0.03;
	document.getElementById('estimasibeli').value = parseFloat(amount) / parseFloat(price);
}

function noSellChanged(){
	var amount = document.getElementById('jumlahjual').value;
	var price = document.getElementById('hargajual').value;
	document.getElementById('biyajual').value = parseFloat(amount)*0.03;
	document.getElementById('estimasijual').value = parseFloat(amount) / parseFloat(price);
}

function noenter() {
  return !(window.event && window.event.keyCode == 13);
}	

