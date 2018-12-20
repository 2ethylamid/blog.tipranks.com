<div class="share-wrap col-sm-12">
	<div class="share-wrap-inner clearfix">
		<div class="share-text h4"><?php esc_html_e( 'Share this article:', 'daily-news' ); ?></div>

		<ul>
			<!-- facebook -->
			<li>
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" target="_blank"><i class="fa fa-facebook" ></i></a>
			</li>
			<!-- twitter -->
			<li>
				<a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" target="_blank"><i class="fa fa-twitter" ></i></a>
			</li>
			<!-- google plus -->
			<li>
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;"><i class="fa fa-google-plus"></i></a>
			</li>
			<!-- digg -->
			<li>
				<a href="http://www.digg.com/submit?url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'digg-share', 'width=490,height=530');return false;"><i class="fa fa-digg"></i></a>
			</li>
			<!-- reddit -->
			<li>
				<a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php echo urlencode(get_the_title()); ?>" onclick="window.open(this.href, 'reddit-share', 'width=490,height=530');return false;"><i class="fa fa-reddit"></i></a>
			</li>
			<!-- linkedin -->
			<li>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'linkedin-share', 'width=490,height=530');return false;" target="_blank"><i class="fa fa-linkedin"></i></a>
			</li>
			<!-- pinterest -->
				<li>
					<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
				</li>
			<!-- StumbleUpon-->
			<li>
				<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php echo urlencode(get_the_title()); ?>" onclick="window.open(this.href, 'stumbleupon-share', 'width=490,height=530');return false;"><i class="fa fa-stumbleupon"></i></a>
			</li>
		</ul>
	</div>
</div>