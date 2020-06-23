(function(){
	"use strict"
	var app = {
		init: function(){
			/*if(this.detectIE()){
				alert("This app is not supported by Internet Explorer!");
            }*/
			this.data = {
				template :[
				"<div class = 'clickad-rtxte-wrapper'>",
					"<div class = 'clickad-rtxte-header'>",
						"<div class = 'clickad-rtxte-header-set'>",
						"</div>",
						"<div class = 'clickad-rtxte-option-wrapper'>",
						"</div>",
						"<div class = 'clickad-rtxte-option-wrapper'>",
						"</div>",
						"<div class = 'clickad-rtxte-option-wrapper'>",
						"<button type='button' class='clickad-rtxte-color__choosen' data-type = 'currentColor' title = 'font color'></button>",
						"</div>",
						"<div class = 'clickad-rtxte-option-wrapper'>",
						"<button type='button' class='clickad-rtxte-background__choosen' data-type = 'currentBackground' title = 'background color'></button>",
						"</div>",
						"<div class = 'clickad-rtxte-option-wrapper'>",
						"</div>",
					"</div>",
					"<div class = 'clickad-rtxte-body'>",
						"<div class = 'clickad-rtxte-input' contenteditable = 'true' id = 'clickad-rtxte-input'>",
						"</div>",
					"</div>",
					"</div>"
				],
				"buttons":[
					{
						"classes": "clickad-rtxte-button oi oi-action-undo",
						"id": "clickad-rtxte-undo",
						"title": "undo",
						"data": "undo",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-action-redo",
						"id": "clickad-rtxte-redo",
						"title": "redo",
						"data": "redo",
						"html": "",
						"options": []
					},
										{
						"classes": "clickad-rtxte-button oi oi-trash",
						"id": "clickad-rtxte-delete",
						"title": "delete",
						"data": "delete",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-circle-x",
						"id": "clickad-rtxte-remove",
						"title": "remove formatting",
						"data": "removeFormat",
						"html": "",
						"options": []
					},
					{
						"classes": "oi clickad-rtxte-button clickad-rtxte-font",
						"id": "clickad-rtxte-font",
						"title": "font family",
						"data": "",
						"html": "<span class='clickad-rtxte-font__text'>Arial</span><span class='oi oi-caret-bottom clickad-rtxte-caret'></span>",
						"options": [
							{
								"content": "Arial",
								"type": "fontName",
								"val": "Arial",
								"style":""
							},
							{
								"content": "Arial Black",
								"type": "fontName",
								"val": "Arial Black",
								"style":"font-family:Arial Black"
							},
							{
								"content": "Bookman",
								"type": "fontName",
								"val": "Bookman",
								"style":"font-family:Bookman"
							},
							{
								"content": "Comic Sans MS",
								"type": "fontName",
								"val": "Comic Sans MS",
								"style":"font-family:Comic Sans MS"
							},
							{
								"content": "Courier",
								"type": "fontName",
								"val": "Courier",
								"style":"font-family:Courier"
							},
							{
								"content": "Courier New",
								"type": "fontName",
								"val": "Courier New",
								"style":"font-family:Courier New"
							},
							{
								"content": "Garamond",
								"type": "fontName",
								"val": "Garamond",
								"style":"font-family:Garamond"
							},
							{
								"content": "Georgia",
								"type": "fontName",
								"val": "Georgia",
								"style":"font-family:Georgia"
							},
							{
								"content": "Helvetica",
								"type": "fontName",
								"val": "Helvetica",
								"style":"font-family:Arial"
							},
							{
								"content": "Impact",
								"type": "fontName",
								"val": "Impact",
								"style":"font-family:Impact"
							},
							{
								"content": "Palatino",
								"type": "fontName",
								"val": "Palatino",
								"style":"font-family:Palatino"
							},
							{
								"content": "Times",
								"type": "fontName",
								"val": "Times",
								"style":"font-family:Times"
							},
							{
								"content": "Times New Roman",
								"type": "fontName",
								"val": "Times New Roman",
								"style":"font-family:Times New Roman"
							},
							{
								"content": "Trebuchet MS",
								"type": "fontName",
								"val": "Trebuchet MS",
								"style":"font-family:Trebuchet MS"
							},
							{
								"content": "Verdana",
								"type": "fontName",
								"val": "Verdana",
								"style":"font-family:Verdana"
							},
						]
					},
					{
						"classes": "oi clickad-rtxte-button",
						"id": "clickad-rtxte-font-size",
						"title": "font size",
						"data": "",
						"html": "<span class='clickad-rtxte-size__text'>16</span><span class='oi oi-caret-bottom clickad-rtxte-caret'></span>",
						"options": [
							{
								"content": "10",
								"type": "fontSize",
								"val": "1",
								"style":""
							},
							{
								"content": "13",
								"type": "fontSize",
								"val": "2",
								"style":""
							},
							{
								"content": "16",
								"type": "fontSize",
								"val": "3",
								"style":""
							},
							{
								"content": "18",
								"type": "fontSize",
								"val": "4",
								"style":""
							},
							{
								"content": "24",
								"type": "fontSize",
								"val": "5",
								"style":""
							},
							{
								"content": "32",
								"type": "fontSize",
								"val": "6",
								"style":""
							},
							{
								"content": "48",
								"type": "fontSize",
								"val": "7",
								"style":""
							}
						]
					},
					{
						"classes": "clickad-rtxte-button oi oi-brush",
						"id": "clickad-rtxte-color",
						"title": "font color",
						"data": "",
						"html": "<span class='oi oi-caret-bottom clickad-rtxte-caret'></span>",
						"options": [
							{"content":"Black","type":"foreColor","val":"#000000","style":""},
							{"content":"Navy","type":"foreColor","val":"#000080","style":""},
							{"content":"DarkBlue","type":"foreColor","val":"#00008B","style":""},
							{"content":"MediumBlue","type":"foreColor","val":"#0000CD","style":""},
							{"content":"Blue","type":"foreColor","val":"#0000FF","style":""},
							{"content":"DarkGreen","type":"foreColor","val":"#006400","style":""},
							{"content":"Green","type":"foreColor","val":"#008000","style":""},
							{"content":"Teal","type":"foreColor","val":"#008080","style":""},
							{"content":"DarkCyan","type":"foreColor","val":"#008B8B","style":""},
							{"content":"DeepSkyBlue","type":"foreColor","val":"#00BFFF","style":""},
							{"content":"DarkTurquoise","type":"foreColor","val":"#00CED1","style":""},
							{"content":"MediumSpringGreen","type":"foreColor","val":"#00FA9A","style":""},
							{"content":"Lime","type":"foreColor","val":"#00FF00","style":""},
							{"content":"SpringGreen","type":"foreColor","val":"#00FF7F","style":""},
							{"content":"Aqua ","type":"foreColor","val":"#00FFFF","style":""},
							{"content":"Cyan","type":"foreColor","val":"#00FFFF","style":""},
							{"content":"MidnightBlue","type":"foreColor","val":"#191970","style":""},
							{"content":"DodgerBlue","type":"foreColor","val":"#1E90FF","style":""},
							{"content":"LightSeaGreen","type":"foreColor","val":"#20B2AA","style":""},
							{"content":"ForestGreen","type":"foreColor","val":"#228B22","style":""},
							{"content":"SeaGreen","type":"foreColor","val":"#2E8B57","style":""},
							{"content":"DarkSlateGray","type":"foreColor","val":"#2F4F4F","style":""},
							{"content":"LimeGreen","type":"foreColor","val":"#32CD32","style":""},
							{"content":"MediumSeaGreen","type":"foreColor","val":"#3CB371","style":""},
							{"content":"Turquoise","type":"foreColor","val":"#40E0D0","style":""},
							{"content":"RoyalBlue","type":"foreColor","val":"#4169E1","style":""},
							{"content":"SteelBlue","type":"foreColor","val":"#4682B4","style":""},
							{"content":"DarkSlateBlue","type":"foreColor","val":"#483D8B","style":""},
							{"content":"MediumTurquoise","type":"foreColor","val":"#48D1CC","style":""},
							{"content":"Indigo","type":"foreColor","val":"#4B0082","style":""},
							{"content":"DarkOliveGreen","type":"foreColor","val":"#556B2F","style":""},
							{"content":"CadetBlue","type":"foreColor","val":"#5F9EA0","style":""},
							{"content":"CornflowerBlue","type":"foreColor","val":"#6495ED","style":""},
							{"content":"RebeccaPurple","type":"foreColor","val":"#663399","style":""},
							{"content":"MediumAquaMarine","type":"foreColor","val":"#66CDAA","style":""},
							{"content":"DimGray","type":"foreColor","val":"#696969","style":""},
							{"content":"SlateBlue","type":"foreColor","val":"#6A5ACD","style":""},
							{"content":"OliveDrab","type":"foreColor","val":"#6B8E23","style":""},
							{"content":"SlateGray","type":"foreColor","val":"#708090","style":""},
							{"content":"SlateGrey","type":"foreColor","val":"#708090","style":""},
							{"content":"LightSlateGray","type":"foreColor","val":"#778899","style":""},
							{"content":"MediumSlateBlue","type":"foreColor","val":"#7B68EE","style":""},
							{"content":"LawnGreen","type":"foreColor","val":"#7CFC00","style":""},
							{"content":"Chartreuse","type":"foreColor","val":"#7FFF00","style":""},
							{"content":"Aquamarine","type":"foreColor","val":"#7FFFD4","style":""},
							{"content":"Maroon","type":"foreColor","val":"#800000","style":""},
							{"content":"Purple","type":"foreColor","val":"#800080","style":""},
							{"content":"Olive","type":"foreColor","val":"#808000","style":""},
							{"content":"Gray","type":"foreColor","val":"#808080","style":""},
							{"content":"SkyBlue","type":"foreColor","val":"#87CEEB","style":""},
							{"content":"LightSkyBlue","type":"foreColor","val":"#87CEFA","style":""},
							{"content":"BlueViolet","type":"foreColor","val":"#8A2BE2","style":""},
							{"content":"DarkRed","type":"foreColor","val":"#8B0000","style":""},
							{"content":"DarkMagenta","type":"foreColor","val":"#8B008B","style":""},
							{"content":"SaddleBrown","type":"foreColor","val":"#8B4513","style":""},
							{"content":"DarkSeaGreen","type":"foreColor","val":"#8FBC8F","style":""},
							{"content":"LightGreen","type":"foreColor","val":"#90EE90","style":""},
							{"content":"MediumPurple","type":"foreColor","val":"#9370DB","style":""},
							{"content":"DarkViolet","type":"foreColor","val":"#9400D3","style":""},
							{"content":"PaleGreen","type":"foreColor","val":"#98FB98","style":""},
							{"content":"DarkOrchid","type":"foreColor","val":"#9932CC","style":""},
							{"content":"YellowGreen","type":"foreColor","val":"#9ACD32","style":""},
							{"content":"Sienna","type":"foreColor","val":"#A0522D","style":""},
							{"content":"Brown","type":"foreColor","val":"#A52A2A","style":""},
							{"content":"DarkGray","type":"foreColor","val":"#A9A9A9","style":""},
							{"content":"LightBlue","type":"foreColor","val":"#ADD8E6","style":""},
							{"content":"GreenYellow","type":"foreColor","val":"#ADFF2F","style":""},
							{"content":"PaleTurquoise","type":"foreColor","val":"#AFEEEE","style":""},
							{"content":"LightSteelBlue","type":"foreColor","val":"#B0C4DE","style":""},
							{"content":"PowderBlue","type":"foreColor","val":"#B0E0E6","style":""},
							{"content":"FireBrick","type":"foreColor","val":"#B22222","style":""},
							{"content":"DarkGoldenRod","type":"foreColor","val":"#B8860B","style":""},
							{"content":"MediumOrchid","type":"foreColor","val":"#BA55D3","style":""},
							{"content":"RosyBrown","type":"foreColor","val":"#BC8F8F","style":""},
							{"content":"DarkKhaki","type":"foreColor","val":"#BDB76B","style":""},
							{"content":"Silver","type":"foreColor","val":"#C0C0C0","style":""},
							{"content":"MediumVioletRed","type":"foreColor","val":"#C71585","style":""},
							{"content":"IndianRed","type":"foreColor","val":"#CD5C5C","style":""},
							{"content":"Peru","type":"foreColor","val":"#CD853F","style":""},
							{"content":"Chocolate","type":"foreColor","val":"#D2691E","style":""},
							{"content":"Tan","type":"foreColor","val":"#D2B48C","style":""},
							{"content":"LightGray","type":"foreColor","val":"#D3D3D3","style":""},
							{"content":"Thistle","type":"foreColor","val":"#D8BFD8","style":""},
							{"content":"Orchid","type":"foreColor","val":"#DA70D6","style":""},
							{"content":"GoldenRod","type":"foreColor","val":"#DAA520","style":""},
							{"content":"PaleVioletRed","type":"foreColor","val":"#DB7093","style":""},
							{"content":"Crimson","type":"foreColor","val":"#DC143C","style":""},
							{"content":"Gainsboro","type":"foreColor","val":"#DCDCDC","style":""},
							{"content":"Plum","type":"foreColor","val":"#DDA0DD","style":""},
							{"content":"BurlyWood","type":"foreColor","val":"#DEB887","style":""},
							{"content":"LightCyan","type":"foreColor","val":"#E0FFFF","style":""},
							{"content":"DarkSalmon","type":"foreColor","val":"#E9967A","style":""},
							{"content":"Violet","type":"foreColor","val":"#EE82EE","style":""},
							{"content":"PaleGoldenRod","type":"foreColor","val":"#EEE8AA","style":""},
							{"content":"LightCoral","type":"foreColor","val":"#F08080","style":""},
							{"content":"Khaki","type":"foreColor","val":"#F0E68C","style":""},
							{"content":"SandyBrown","type":"foreColor","val":"#F4A460","style":""},
							{"content":"Wheat","type":"foreColor","val":"#F5DEB3","style":""},
							{"content":"Beige","type":"foreColor","val":"#F5F5DC","style":""},
							{"content":"WhiteSmoke","type":"foreColor","val":"#F5F5F5","style":""},
							{"content":"Salmon","type":"foreColor","val":"#FA8072","style":""},
							{"content":"OldLace","type":"foreColor","val":"#FDF5E6","style":""},
							{"content":"Red","type":"foreColor","val":"#FF0000","style":""},
							{"content":"Fuchsia","type":"foreColor","val":"#FF00FF","style":""},
							{"content":"Magenta","type":"foreColor","val":"#FF00FF","style":""},
							{"content":"DeepPink","type":"foreColor","val":"#FF1493","style":""},
							{"content":"OrangeRed","type":"foreColor","val":"#FF4500","style":""},
							{"content":"Tomato","type":"foreColor","val":"#FF6347","style":""},
							{"content":"HotPink","type":"foreColor","val":"#FF69B4","style":""},
							{"content":"Coral","type":"foreColor","val":"#FF7F50","style":""},
							{"content":"DarkOrange","type":"foreColor","val":"#FF8C00","style":""},
							{"content":"LightSalmon","type":"foreColor","val":"#FFA07A","style":""},
							{"content":"Orange","type":"foreColor","val":"#FFA500","style":""},
							{"content":"LightPink","type":"foreColor","val":"#FFB6C1","style":""},
							{"content":"Pink","type":"foreColor","val":"#FFC0CB","style":""},
							{"content":"Gold","type":"foreColor","val":"#FFD700","style":""},
							{"content":"MistyRose","type":"foreColor","val":"#FFE4E1","style":""},
							{"content":"Yellow","type":"foreColor","val":"#FFFF00","style":""},
							{"content":"White","type":"foreColor","val":"#FFFFFF","style":""}
						]
					},
					{
						"classes": "clickad-rtxte-button oi oi-spreadsheet",
						"id": "clickad-rtxte-background",
						"title": "background color",
						"data": "",
						"html": "<span class='oi oi-caret-bottom clickad-rtxte-caret'></span>",
						"options": [
							{"content":"Black","type":"backColor","val":"#000000","style":""},
							{"content":"Navy","type":"backColor","val":"#000080","style":""},
							{"content":"DarkBlue","type":"backColor","val":"#00008B","style":""},
							{"content":"MediumBlue","type":"backColor","val":"#0000CD","style":""},
							{"content":"Blue","type":"backColor","val":"#0000FF","style":""},
							{"content":"DarkGreen","type":"backColor","val":"#006400","style":""},
							{"content":"Green","type":"backColor","val":"#008000","style":""},
							{"content":"Teal","type":"backColor","val":"#008080","style":""},
							{"content":"DarkCyan","type":"backColor","val":"#008B8B","style":""},
							{"content":"DeepSkyBlue","type":"backColor","val":"#00BFFF","style":""},
							{"content":"DarkTurquoise","type":"backColor","val":"#00CED1","style":""},
							{"content":"MediumSpringGreen","type":"backColor","val":"#00FA9A","style":""},
							{"content":"Lime","type":"backColor","val":"#00FF00","style":""},
							{"content":"SpringGreen","type":"backColor","val":"#00FF7F","style":""},
							{"content":"Aqua ","type":"backColor","val":"#00FFFF","style":""},
							{"content":"Cyan","type":"backColor","val":"#00FFFF","style":""},
							{"content":"MidnightBlue","type":"backColor","val":"#191970","style":""},
							{"content":"DodgerBlue","type":"backColor","val":"#1E90FF","style":""},
							{"content":"LightSeaGreen","type":"backColor","val":"#20B2AA","style":""},
							{"content":"ForestGreen","type":"backColor","val":"#228B22","style":""},
							{"content":"SeaGreen","type":"backColor","val":"#2E8B57","style":""},
							{"content":"DarkSlateGray","type":"backColor","val":"#2F4F4F","style":""},
							{"content":"LimeGreen","type":"backColor","val":"#32CD32","style":""},
							{"content":"MediumSeaGreen","type":"backColor","val":"#3CB371","style":""},
							{"content":"Turquoise","type":"backColor","val":"#40E0D0","style":""},
							{"content":"RoyalBlue","type":"backColor","val":"#4169E1","style":""},
							{"content":"SteelBlue","type":"backColor","val":"#4682B4","style":""},
							{"content":"DarkSlateBlue","type":"backColor","val":"#483D8B","style":""},
							{"content":"MediumTurquoise","type":"backColor","val":"#48D1CC","style":""},
							{"content":"Indigo","type":"backColor","val":"#4B0082","style":""},
							{"content":"DarkOliveGreen","type":"backColor","val":"#556B2F","style":""},
							{"content":"CadetBlue","type":"backColor","val":"#5F9EA0","style":""},
							{"content":"CornflowerBlue","type":"backColor","val":"#6495ED","style":""},
							{"content":"RebeccaPurple","type":"backColor","val":"#663399","style":""},
							{"content":"MediumAquaMarine","type":"backColor","val":"#66CDAA","style":""},
							{"content":"DimGray","type":"backColor","val":"#696969","style":""},
							{"content":"SlateBlue","type":"backColor","val":"#6A5ACD","style":""},
							{"content":"OliveDrab","type":"backColor","val":"#6B8E23","style":""},
							{"content":"SlateGray","type":"backColor","val":"#708090","style":""},
							{"content":"SlateGrey","type":"backColor","val":"#708090","style":""},
							{"content":"LightSlateGray","type":"backColor","val":"#778899","style":""},
							{"content":"MediumSlateBlue","type":"backColor","val":"#7B68EE","style":""},
							{"content":"LawnGreen","type":"backColor","val":"#7CFC00","style":""},
							{"content":"Chartreuse","type":"backColor","val":"#7FFF00","style":""},
							{"content":"Aquamarine","type":"backColor","val":"#7FFFD4","style":""},
							{"content":"Maroon","type":"backColor","val":"#800000","style":""},
							{"content":"Purple","type":"backColor","val":"#800080","style":""},
							{"content":"Olive","type":"backColor","val":"#808000","style":""},
							{"content":"Gray","type":"backColor","val":"#808080","style":""},
							{"content":"SkyBlue","type":"backColor","val":"#87CEEB","style":""},
							{"content":"LightSkyBlue","type":"backColor","val":"#87CEFA","style":""},
							{"content":"BlueViolet","type":"backColor","val":"#8A2BE2","style":""},
							{"content":"DarkRed","type":"backColor","val":"#8B0000","style":""},
							{"content":"DarkMagenta","type":"backColor","val":"#8B008B","style":""},
							{"content":"SaddleBrown","type":"backColor","val":"#8B4513","style":""},
							{"content":"DarkSeaGreen","type":"backColor","val":"#8FBC8F","style":""},
							{"content":"LightGreen","type":"backColor","val":"#90EE90","style":""},
							{"content":"MediumPurple","type":"backColor","val":"#9370DB","style":""},
							{"content":"DarkViolet","type":"backColor","val":"#9400D3","style":""},
							{"content":"PaleGreen","type":"backColor","val":"#98FB98","style":""},
							{"content":"DarkOrchid","type":"backColor","val":"#9932CC","style":""},
							{"content":"YellowGreen","type":"backColor","val":"#9ACD32","style":""},
							{"content":"Sienna","type":"backColor","val":"#A0522D","style":""},
							{"content":"Brown","type":"backColor","val":"#A52A2A","style":""},
							{"content":"DarkGray","type":"backColor","val":"#A9A9A9","style":""},
							{"content":"LightBlue","type":"backColor","val":"#ADD8E6","style":""},
							{"content":"GreenYellow","type":"backColor","val":"#ADFF2F","style":""},
							{"content":"PaleTurquoise","type":"backColor","val":"#AFEEEE","style":""},
							{"content":"LightSteelBlue","type":"backColor","val":"#B0C4DE","style":""},
							{"content":"PowderBlue","type":"backColor","val":"#B0E0E6","style":""},
							{"content":"FireBrick","type":"backColor","val":"#B22222","style":""},
							{"content":"DarkGoldenRod","type":"backColor","val":"#B8860B","style":""},
							{"content":"MediumOrchid","type":"backColor","val":"#BA55D3","style":""},
							{"content":"RosyBrown","type":"backColor","val":"#BC8F8F","style":""},
							{"content":"DarkKhaki","type":"backColor","val":"#BDB76B","style":""},
							{"content":"Silver","type":"backColor","val":"#C0C0C0","style":""},
							{"content":"MediumVioletRed","type":"backColor","val":"#C71585","style":""},
							{"content":"IndianRed","type":"backColor","val":"#CD5C5C","style":""},
							{"content":"Peru","type":"backColor","val":"#CD853F","style":""},
							{"content":"Chocolate","type":"backColor","val":"#D2691E","style":""},
							{"content":"Tan","type":"backColor","val":"#D2B48C","style":""},
							{"content":"LightGray","type":"backColor","val":"#D3D3D3","style":""},
							{"content":"Thistle","type":"backColor","val":"#D8BFD8","style":""},
							{"content":"Orchid","type":"backColor","val":"#DA70D6","style":""},
							{"content":"GoldenRod","type":"backColor","val":"#DAA520","style":""},
							{"content":"PaleVioletRed","type":"backColor","val":"#DB7093","style":""},
							{"content":"Crimson","type":"backColor","val":"#DC143C","style":""},
							{"content":"Gainsboro","type":"backColor","val":"#DCDCDC","style":""},
							{"content":"Plum","type":"backColor","val":"#DDA0DD","style":""},
							{"content":"BurlyWood","type":"backColor","val":"#DEB887","style":""},
							{"content":"LightCyan","type":"backColor","val":"#E0FFFF","style":""},
							{"content":"DarkSalmon","type":"backColor","val":"#E9967A","style":""},
							{"content":"Violet","type":"backColor","val":"#EE82EE","style":""},
							{"content":"PaleGoldenRod","type":"backColor","val":"#EEE8AA","style":""},
							{"content":"LightCoral","type":"backColor","val":"#F08080","style":""},
							{"content":"Khaki","type":"backColor","val":"#F0E68C","style":""},
							{"content":"SandyBrown","type":"backColor","val":"#F4A460","style":""},
							{"content":"Wheat","type":"backColor","val":"#F5DEB3","style":""},
							{"content":"Beige","type":"backColor","val":"#F5F5DC","style":""},
							{"content":"WhiteSmoke","type":"backColor","val":"#F5F5F5","style":""},
							{"content":"Salmon","type":"backColor","val":"#FA8072","style":""},
							{"content":"OldLace","type":"backColor","val":"#FDF5E6","style":""},
							{"content":"Red","type":"backColor","val":"#FF0000","style":""},
							{"content":"Fuchsia","type":"backColor","val":"#FF00FF","style":""},
							{"content":"Magenta","type":"backColor","val":"#FF00FF","style":""},
							{"content":"DeepPink","type":"backColor","val":"#FF1493","style":""},
							{"content":"OrangeRed","type":"backColor","val":"#FF4500","style":""},
							{"content":"Tomato","type":"backColor","val":"#FF6347","style":""},
							{"content":"HotPink","type":"backColor","val":"#FF69B4","style":""},
							{"content":"Coral","type":"backColor","val":"#FF7F50","style":""},
							{"content":"DarkOrange","type":"backColor","val":"#FF8C00","style":""},
							{"content":"LightSalmon","type":"backColor","val":"#FFA07A","style":""},
							{"content":"Orange","type":"backColor","val":"#FFA500","style":""},
							{"content":"LightPink","type":"backColor","val":"#FFB6C1","style":""},
							{"content":"Pink","type":"backColor","val":"#FFC0CB","style":""},
							{"content":"Gold","type":"backColor","val":"#FFD700","style":""},
							{"content":"MistyRose","type":"backColor","val":"#FFE4E1","style":""},
							{"content":"Yellow","type":"backColor","val":"#FFFF00","style":""},
							{"content":"White","type":"backColor","val":"#FFFFFF","style":""}
						]
					},
					{
						"classes": "clickad-rtxte-button oi oi-header",
						"id": "clickad-rtxte-heading",
						"title": "heading",
						"data": "",
						"html": "<span class='oi oi-caret-bottom clickad-rtxte-caret'></span>",
						"options": [
							{
								"content": "h1",
								"type": "heading",
								"val": "h1",
								"style":""
							},
							{
								"content": "h2",
								"type": "heading",
								"val": "h2",
								"style":""
							},
							{
								"content": "h3",
								"type": "heading",
								"val": "h3",
								"style":""
							},
							{
								"content": "h4",
								"type": "heading",
								"val": "h4",
								"style":""
							},
							{
								"content": "h5",
								"type": "heading",
								"val": "h5",
								"style":""
							},
							{
								"content": "h6",
								"type": "heading",
								"val": "h6",
								"style":""
							}
						]
					},
					{
						"classes": "clickad-rtxte-button oi oi-bold",
						"id": "clickad-rtxte-bold",
						"title": "bold",
						"data": "bold",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-italic",
						"id": "clickad-rtxte-italic",
						"title": "italic",
						"data": "italic",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-underline",
						"id": "clickad-rtxte-underline",
						"title": "underline",
						"data": "underline",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-vertical-align-center",
						"id": "clickad-rtxte-line",
						"title": "horizontal line",
						"data": "insertHorizontalRule",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-align-left",
						"id": "clickad-rtxte-left",
						"title": "justify left",
						"data": "justifyLeft",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-align-center",
						"id": "clickad-rtxte-center",
						"title": "justify center",
						"data": "justifyCenter",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-align-right",
						"id": "clickad-rtxte-right",
						"title": "justify right",
						"data": "justifyRight",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-justify-center",
						"id": "clickad-rtxte-full",
						"title": "justify full",
						"data": "justifyFull",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-list",
						"id": "clickad-rtxte-list-1",
						"title": "ordered list",
						"data": "insertOrderedList",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-list-rich",
						"id": "clickad-rtxte-list-2",
						"title": "unordered list",
						"data": "insertUnorderedList",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-account-login",
						"id": "clickad-rtxte-indent",
						"title": "indent",
						"data": "indent",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-account-login clickad-rtxte-rotate-btn",
						"id": "clickad-rtxte-outdent",
						"title": "outdent",
						"data": "outdent",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-double-quote-sans-left",
						"id": "clickad-rtxte-quotes",
						"title": "quotes",
						"data": "blockquote",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-code",
						"id": "clickad-rtxte-code",
						"title": "code",
						"data": "pre",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-link-intact",
						"id": "clickad-rtxte-addlink",
						"title": "add link",
						"data": "createLink",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-link-broken",
						"id": "clickad-rtxte-removelink",
						"title": "remove link",
						"data": "unlink",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-image",
						"id": "clickad-rtxte-image",
						"title": "add image",
						"data": "insertImage",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-document",
						"id": "clickad-rtxte-document",
						"title": "A4",
						"data": "a4",
						"html": "",
						"options": []
					},
					{
						"classes": "clickad-rtxte-button oi oi-print",
						"id": "clickad-rtxte-print",
						"title": "print",
						"data": "print",
						"html": "",
						"options": []
					}
				]
			};

			this.$txte = $("#clickad-rtxte");
			this.$txte.append(this.data.template.join(""));
			this.header = $(".clickad-rtxte-header");
			this.setWrapper = $(".clickad-rtxte-header-set");
			this.optionsWrapper = $(".clickad-rtxte-option-wrapper");


			this.createEditor(this.$txte);
			this.$document = $(document);
			this.$edditable = $("#clickad-rtxte-input");
			this.$edditableWrapper = $(".clickad-rtxte-body");
			this.$btn = $(".clickad-rtxte-button");
			this.$allOptions = $(".clickad-rtxte-options");

			this.$font = $("#clickad-rtxte-font");
			this.$fontOption = $($(".clickad-rtxte-options")[0]);
			this.$fontFamily = this.$fontOption.find(".clickad-rtxte-button");
			this.$currentFont = $(".clickad-rtxte-font__text");
			this.$fontOption.addClass("clickad-rtxte-options-overflow");

			this.$fontSize = $("#clickad-rtxte-font-size");
			this.$fontSizeOption = $($(".clickad-rtxte-options")[1]);
			this.$sizeNum = this.$fontSizeOption.find(".clickad-rtxte-button");
			this.$currentSize = $(".clickad-rtxte-size__text");

			this.$fontColor = $("#clickad-rtxte-color");
			this.$fontColorOption = $($(".clickad-rtxte-options")[2]);
			this.$color = this.$fontColorOption.find(".clickad-rtxte-button");
			this.$currentColor = $(".clickad-rtxte-color__choosen");
			this.$fontColorOption.addClass("clickad-rtxte-options-overflow");
			this.$fontColorOption.addClass("clickad-rtxte-options--pallet");

			this.$background = $("#clickad-rtxte-background");
			this.$backgroundOption = $($(".clickad-rtxte-options")[3]);
			this.$backgroundColor = this.$backgroundOption.find(".clickad-rtxte-button");
			this.$currentBackground = $(".clickad-rtxte-background__choosen");
			this.$backgroundOption.addClass("clickad-rtxte-options-overflow");
			this.$backgroundOption.addClass("clickad-rtxte-options--pallet");

			this.$heading = $("#clickad-rtxte-heading");
			this.$headingOption = $($(".clickad-rtxte-options")[4]);
			this.$header = this.$headingOption.find(".clickad-rtxte-button");

			this.$btn.on("click", this.edit.bind(this));
			this.$document.on("click", this.closeOption.bind(this));
			this.$edditable.on("click", this.updateCurrent.bind(this));
			this.$currentColor.on("click", this.edit.bind(this));
			this.$currentBackground.on("click", this.edit.bind(this));

			this.optionsClick(this.$font, "font", this.$fontOption);
			this.optionsClick(this.$fontFamily, "fontName", this.$fontOption);
			this.optionsClick(this.$fontSize, "fontSize", this.$fontSizeOption);
			this.optionsClick(this.$sizeNum, "sizeNum", this.$fontSizeOption);

			this.optionsClick(this.$fontColor, "fontColor", this.$fontColorOption);
			this.optionsClick(this.$color, "color", this.$fontColorOption);
			this.optionsClick(this.$background, "backColor", this.$backgroundOption);
			this.optionsClick(this.$backgroundColor, "background", this.$backgroundOption);
			this.optionsClick(this.$heading, "heading", this.$headingOption);
			this.optionsClick(this.$header, "header", this.$headingOption);
		},
		createEditor: function(container){
			var self = this;
			var i = 0;
			var setButtons = ["undo","redo","removeFormat","delete"];
			this.data.buttons.forEach(function(button){
				if(setButtons.indexOf(button.data) > -1){
					self.appendRegularBtn(self.setWrapper, button);
				} else if(button.options.length > 0){
					self.appendRegularBtn($(self.optionsWrapper[i]), button);
					$(self.optionsWrapper[i]).append("<div class = 'clickad-rtxte-options'>");
					var options = $(".clickad-rtxte-options");
					button.options.forEach(function(option){
						if(option.type === "foreColor" || option.type === "backColor"){
							$(options[i]).append(
							"<button type='button' class = 'clickad-rtxte-button clickad-rtxte-options__button clickad-rtxte-options--color' data-type = '" + option.type +
							"' data-val = '" + option.val +
							"' style = background:" + option.val +
							"></button>"
							);
						} else {
							$(options[i]).append(
							"<button type='button' class = 'clickad-rtxte-button clickad-rtxte-options__button' data-type = '" + option.type +
							"' data-val = '" + option.val +
							"' style = '" + option.style +
							"'>" + option.content +
							"</button>");
						}
					});
					i++;
				} else {
					self.appendRegularBtn(self.header, button);
				}
			});
		},
		appendRegularBtn: function(wrapper, button){
			wrapper.append(
				"<button type='button' class = '" + button.classes +
				"' id = '" + button.id +
				"' title ='" + button.title +
				"' data-type = '" + button.data +
				"'>" + button.html +
				"</button>"
			);
		},
		edit: function(event){
			this.$edditable.focus();
			var type = $(event.target).data("type") || "";
			var optionTypes = ["createLink","heading","fontName","fontSize","foreColor","backColor"];
			var val;
			if(optionTypes.indexOf(type) > -1){
				this.editValue(event, type);
			}
			switch (type){
				case "currentColor":
					val = $(event.target).css("background-color");
					val = this.rgb2hex(val);
					document.execCommand("foreColor", false, val);
					break;
				case "currentBackground":
					val = $(event.target).css("background-color");
					val = this.rgb2hex(val);
					document.execCommand("backColor", false, val);
					break;
				case "blockquote":
					document.execCommand("formatBlock", false, type);
					break;
				case "pre":
					document.execCommand("formatBlock", false, type);
					break;
				case "heading":
					val = $(event.target).data("val");
					document.execCommand("formatBlock", false, val);
					break;
				case "insertImage":
					val = prompt('Enter a path to the image:');
					if(val != 'NULL') {
						document.execCommand(type, false, val)
					};
					break;
				case "print":
					window.print();
					break;
				case "a4":
					this.$edditable.toggleClass("clickad-rtxte-page-a4");
					this.$edditableWrapper.toggleClass("clickad-rtxte-body-a4");
					break;
				default:
					document.execCommand(type);
			}
		},
		editValue: function(event, type){
			var val = $(event.target).data("val");
			setTimeout(function(){
				document.execCommand(type, false, val)
			});
		},
		toggleOption: function(type, options, event){

			var opts = ["font","fontSize","heading","fontColor","backColor"];
			if(opts.indexOf(type) > -1){
				var el = $(event.target)[0].nodeName;
				this.closeOption(event);
				var caret;
				el === "SPAN" ? caret = $(event.target.parentNode).find(".clickad-rtxte-caret") : caret = $(event.target).find(".clickad-rtxte-caret");
				$(caret).toggleClass("clickad-rtxte-rotate");
			} else {
				$(this.$document).find(".clickad-rtxte-rotate").removeClass("clickad-rtxte-rotate");
			}
			options.slideToggle("fast");
			switch(type){
				case "fontName":
					var font = $(event.target).html();
					var el = $(event.target.parentNode.parentNode).find("#clickad-rtxte-font .clickad-rtxte-font__text")[0];
					$(el).html(font);
					break;
				case "sizeNum":
					var size = $(event.target).html();
					var el = $(event.target.parentNode.parentNode).find("#clickad-rtxte-font-size .clickad-rtxte-size__text")[0];
					$(el).html(size);
					break;
				case "color":
					var color = $(event.target).data('val');
					var el = $(event.target.parentNode.parentNode).find(".clickad-rtxte-color__choosen")[0];
					$(el).css("background", color);
					break;
				case "background":
					var color = $(event.target).data('val');
					var el = $(event.target.parentNode.parentNode).find(".clickad-rtxte-background__choosen")[0];
					$(el).css("background", color);
			}
		},
		closeOption: function(event){
			var btn = $(event.target).closest(".clickad-rtxte-button");
			if (!btn.length || !$(btn.parent().find(".clickad-rtxte-options")).is(':visible')) {
				this.$allOptions.slideUp("fast");
				$(this.$document).find(".clickad-rtxte-rotate").removeClass("clickad-rtxte-rotate");
			}
		},
		rgb2hex: function(rgb){
			rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			return "#" + this.hex(rgb[1]) + this.hex(rgb[2]) + this.hex(rgb[3]);
		},
		hex: function (x) {
				return ("0" + parseInt(x).toString(16)).slice(-2);
		},
		getSelectionStart: function(){
		   var node = document.getSelection().anchorNode;
		   return (node.nodeType == 3 ? node.parentNode : node);
		},
		updateCurrent: function(){
			var target = this.getSelectionStart();
			var face, size;
			target.face ? face = target.face : face = target.parentNode.face;
			target.size ? size = target.size : size = target.parentNode.size;
			if(!face){
				face = target.parentNode.parentNode.face;
			}
			if(!size){
				size = target.parentNode.parentNode.size;
			}

			face ? this.$currentFont.html(face) : this.$currentFont.html("Arial");

			if(size){
				var fontSize;
				switch (size){
					case "1":
						fontSize = "10"
						break;
					case "2":
						fontSize = "13"
						break;
					case "3":
						fontSize = "16"
						break;
					case "4":
						fontSize = "18"
						break;
					case "5":
						fontSize = "24"
						break;
					case "6":
						fontSize = "32"
						break;
					case "7":
						fontSize = "48"
				}
				this.$currentSize.html(fontSize);
			} else {
				this.$currentSize.html("16");
			}
		},
		detectIE: function () {
			var ua = window.navigator.userAgent;
			var msie = ua.indexOf('MSIE ');
			if (msie > 0) {
			// IE 10 or older => return version number
			return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
			}
			var trident = ua.indexOf('Trident/');
			if (trident > 0) {
			// IE 11 => return version number
			var rv = ua.indexOf('rv:');
			return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
			}
			// other browser
			return false;
		},
		optionsClick :  function(button, type, option){
			button.on("click", this.toggleOption.bind(this, type, option));
		}
	}
    // $(window).on('load', app.init());
    $(document).ready(function() {
        app.init()
    });
})()
