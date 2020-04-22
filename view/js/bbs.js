$(document).ready(function() {
	$("#show").click(function() {
		$("#post").css("display", "block");
	});
	$("#cancel").click(function() {
		$("#post").css("display", "none");
	});

	var tou = new Array("tou01.jpg", "tou02.jpg", "tou03.jpg", "tou04.jpg");

	$("#postSuccess").click(function() {
		var newLi = $("<li></li>"); //创建一个新的li节点元素
		var iNum = Math.floor(Math.random() * 4); //随机获取头像
		var touDiv = $("<div></div>"); //创建头像所在的div节点
		var touImg = $("<img></img>"); //创建头像节点
		touImg.attr("src", "images/" + tou[iNum]); //增加头像路径
		touDiv.append(touImg); //将头像放在div节点中

		var titleH1 = $("<h1>" + $("#title").val() + "</h1>"); //创建标题所在的标签h1
		var title = $("#title").val(); //获取标题
		titleH1.innerHTML = title; //将标题内容放在h1标签中
		var newP = $("<p></p>"); //创建一个新的p节点元素
		var secName = $("<span></span>");
		var secSelect = $("#sec").val(); //获取版块
		secName.html("版块：" + secSelect); //把版块内容放到span中
		var myDate = new Date();
		var currentDate = myDate.getFullYear() + "-" + parseInt(myDate.getMonth() + 1) +
			"-" + myDate.getDate() + " " + myDate.getHours() + ":" + myDate.getMinutes();

		var timeSpan = $("<span></span>");
		timeSpan.html("发表时间：" + currentDate);
		newP.append(secName); //在p节点中插入版块
		newP.append(timeSpan); //在p节点中插入发布时间；

		newLi.append(touDiv);
		newLi.append(titleH1);
		newLi.append(newP);
		var postList = $("#postList");
		postList.prepend(newLi, postList.firstChild); //把当前内容插入到列表最前面

		$("#title").val("");
		$("#content").val("");
		$("#post").css("display", "none");
	});
});