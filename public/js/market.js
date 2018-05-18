function onBuyChanged(){
	var amount = getElemetnById('jumlahbeli').value;
	var price = getElementById('hargabeli').value;
	getElementById('biyabeli').value = parseFloat(amount)*0.03;
	getElementById('estimasibeli').value = parseFloat(amount) / parseFloat(price);
}

function noSellChanged(){
	var amount = getElemetnById('jumlahjual').value;
	var price = getElementById('hargajual').value;
	getElementById('biyajual').value = parseFloat(amount)*0.03;
	getElementById('estimasijual').value = parseFloat(amount) / parseFloat(price);
}

function noenter() {
  return !(window.event && window.event.keyCode == 13);
}