<html>
	<head>
		<title>Tween - 1.0</title>
		<script type="text/javascript" src="tween.js"></script>
		<style type="text/css">
			#d,#c{
				border:solid 1px black;
				padding:5px;
				background-color:green;
				margin-bottom:5px;
				width:300px;
				height:300px;
				margin-left: 30px;
				opacity:0;
			}
			table{
				width:400px;
			}
			
			table th,table td{
				border:solid 1px black;
			}
			
		</style>
		<script type="text/javascript">		
			
			
			function tablesorter(ele){
				self = ele;
				var head = [],body = [],foot = [],currentPage = 1,output,pages;
				self.options = {
					'viewAmount':10
				}
				
				this.sort = function(){
					for( i in self.childNodes){
						if(self.childNodes[i].nodeName == 'THEAD'){
							head['head'] = self.childNodes[i];
						}else if(self.childNodes[i].nodeName == 'TBODY'){
							body['body'] = self.childNodes[i];
						}else if(self.childNodes[i].nodeName == 'TFOOT'){
							foot['footer'] = self.childNodes[i];
						}
						//alert(self.childNodes[i].nodeName)
					}
					
					
					//get the row that has all the head content
					for( i in head['head'].childNodes){
						if(head['head'].childNodes[i].nodeName == 'TR'){
							head['row'] = head['head'].childNodes[i];
						}
					}
					
					//get all the head row contents
						head['rowContent'] = [];
					for(i in head['row'].childNodes){
						if(head['row'].childNodes[i].nodeName == 'TH'){
							head['rowContent'][head['rowContent'].length] = head['row'].childNodes[i];
						}
					}
					//head['rowContent'] = [];
					try{
						if(head['rowContent'].length<1) throw "Head Content needed to continue. ie th tags are missing."
					}
					catch(err) {
						message.innerHTML = "Input is " + err;
					}
					
					if(foot.length == 0){
						tfoot = document.createElement('TFOOT');
						tfootTD = document.createElement('TD');
						tfootTD.setAttribute('colspan',head['rowContent'].length)
						tfootTR = document.createElement('TR');
						tfootTR.appendChild(tfootTD);
						tfoot.appendChild(tfootTR);
						foot['footer'] = tfoot;
						foot['footerRow'] = tfootTR;
						foot['footerCol'] = tfootTD;
						body['body'].parentNode.appendChild(tfoot);
					}
					
					//get the body information
					body['bodyRows'] = [];
					for( i in body['body'].childNodes ){
						//alert(body['body'].childNodes[i].nodeName);
						if( body['body'].childNodes[i].nodeName == 'TR'){
							body['body'].childNodes[i].style.display = 'none';
							body['bodyRows'][body['bodyRows'].length] = body['body'].childNodes[i];
						}
					}
					
					this.setView();
				}
				
				this.setView = function(){
					 pages = Math.ceil(body['bodyRows'].length/self.options.viewAmount);
					
					var end = self.options.viewAmount*currentPage;
					var start = end - self.options.viewAmount;
					for(i = start; i < end ;i++){
						body['bodyRows'][i].style.display = '';
					}
					self.output = '<span id="tbleSortLt"><</span> <span>Page '+currentPage+' Of '+pages+'</span><span id="tbleSortRt">></span>';
					foot['footerCol'].innerHTML = self.output;
					document.getElementById('tbleSortLt').onclick = function(){this.prev()};
					document.getElementById('tbleSortRt').onclick = function(){document.getElementById('table').next()};
					
				}
				
				this.next = function(){
					if(currentPage+1 > pages) return false;
					currentPage++;
					this.setView();
				}
				
				this.prev = function(){
					if(currentPage-1 < 1) return false;
					currentPage--;
					this.setView();
				}
				
				//self.sort();
			}
			
			window.onload = function(){
				el = document.getElementById('d');
				el = new ele(el);
				el.animate({'margin-left':'800px','width':'600px','opacity':'1'},'slow',function(){
					el.animate({'margin-left':'400px','width':'300px'},'blast',function(){
						el.animate({'margin-left':'1000px','width':'500px','opacity':'.5'},1090);
					});
				});
				/*el = document.getElementById('c');
				el = new ele(el);
				el.hide();*/
				/*
				el = document.getElementById('table');
				el = new tablesorter(el);
				el.sort();*/
			}
			
		</script>
	</head>
	<body>
		<div id="d">jjj</div>
		<!--<div id="c">jjj</div>-->
		
	<!--
		<table id="table">
			<thead>
				<tr>
					<th>Row One</th>
					<th>Row Two</th>
					<th>Row Three</th>
					<th>Row Four</th>
					<th>Row Five</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>ds1</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds2</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds3</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds4</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds5</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds6</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds7</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds8</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds9</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds10</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds11</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds12</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds13</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds14</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds15</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds16</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds17</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds18</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds19</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds20</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds21</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds22</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds23</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds24</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds25</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds26</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds27</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds28</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds29</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
				<tr>
					<td>ds30</td>
					<td>ee</td>
					<td>tt</td>
					<td>yyy</td>
					<td>qqq</td>
				</tr>
			</tbody>
		</table>
		-->
	</body>
</html>
