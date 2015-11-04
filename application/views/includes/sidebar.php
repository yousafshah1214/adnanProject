<?php
/**
 * Created by PhpStorm.
 * User: Kodemania
 * Date: 31/10/2015
 * Time: 4:48 PM
 */
?>
<div class="col-md-3 sidebar right-sidebar">
                        <div class="widget sidebar-widget search-form-widget">
                          	<div class="input-group input-group-lg">
                            	<input type="text" class="form-control" placeholder="Search Posts...">
                            	<span class="input-group-btn">
                            		<button class="btn btn-primary" type="button"><i class="fa fa-search fa-lg"></i></button>
                            	</span>
                           	</div>
                        </div>
<!--            			<div class="widget sidebar-widget">-->
<!--                        	<h3 class="title">Post Tags</h3>-->
<!--              				<div class="tag-cloud">-->
<!--                            	<a href="#">World</a>-->
<!--                                <a href="#">Education</a>-->
<!--                                <a href="#">Small Business</a>-->
<!--                                <a href="#">Water</a>-->
<!--                                <a href="#">Cities</a>-->
<!--                                <a href="#">India</a>-->
<!--                                <a href="#">Alska</a>-->
<!--                                <a href="#">People</a>-->
<!--                                <a href="#">Forests</a>-->
<!--                                <a href="#">Oceans</a>-->
<!--                                <a href="#">Earth</a>-->
<!--                                <a href="#">Gaea</a>-->
<!--                                <a href="#">Sun</a>-->
<!--                                <a href="#">Planet</a>-->
<!--                                <a href="#">Missions</a>-->
<!--                                <a href="#">Worship</a>-->
<!--                         	</div>-->
<!--            			</div>-->
                    	<div class="widget sidebar-widget widget_categories">
                        	<h3 class="title">Post Categories</h3>
              				<ul>
                                <?php foreach($categories as $category){
    ?>
    <li><a href="<?php echo site_url('blog/category/'.$category->category); ?>"><?php echo $category->category; ?></a> <div style="clear: both;"></div></li>
<?php
} ?>
</ul>
</div>
</div>