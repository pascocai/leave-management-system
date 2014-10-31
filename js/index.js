function addRecord(page,url) {
	if(document.getElementById("hasFK"))
		location.href="add.php?page="+page+"&fkid="+document.getElementById("hasFK").value+"&url="+url;
	else
		location.href="add.php?page="+page+"&url="+url;
}

function editRecord(param) {
	if(document.getElementById("hasFK"))
		location.href="edit.php?"+param+"&fkid="+document.getElementById("hasFK").value;
	else
		location.href="edit.php?"+param;
}

function changeAllDays() {
	location.href="index.php?alldays="+document.getElementById("alldays").value;
}