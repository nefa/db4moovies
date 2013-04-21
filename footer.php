	<?
		
	
	?>			
				</div>
				<div style="clear: both;">&nbsp;</div>
				</div>	
					<div id="sidebar">
					<ul>
						<li>
							<h2>Searh Here:</h2>
							<div id="search" >
								<form method="POST" action="search_movie.php">
									<div>
										<input type="text" name="search"/>
										<input type="submit" name="submit" value="cauta film" />
									</div>
								</form>
							</div>
							<div style="clear: both;">&nbsp;</div>
						</li>
					<!--<li>
							<h2>Aliquam tempus</h2>
							<p>Mauris vitae nisl nec metus placerat perdiet est. Phasellus dapibus semper consectetuer hendrerit.</p>
						</li>-->
					</ul>
					<ul>	
						<li>
							<h2>Categories</h2>
							<ul>
								<?foreach($matrice_categories as $categories_row){?>
									<li><a href="category.php?categorie=<?=$categories_row['id']?>"><?=$categories_row['type_category']?></a></li>
								<?}?>
								
								
							</ul>
						</li>
					<!--<li>
							<h2>Blogroll</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>
						<li>
							<h2>Archives</h2>
							<ul>
								<li><a href="#">Aliquam libero</a></li>
								<li><a href="#">Consectetuer adipiscing elit</a></li>
								<li><a href="#">Metus aliquam pellentesque</a></li>
								<li><a href="#">Suspendisse iaculis mauris</a></li>
								<li><a href="#">Urnanet non molestie semper</a></li>
								<li><a href="#">Proin gravida orci porttitor</a></li>
							</ul>
						</li>-->
					</ul>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page --> 
</div>
<div id="footer">
	<p>Copyright (c) 2012 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org">FCT</a>.</p>
</div>
<!-- end #footer -->
</body>
</html>
