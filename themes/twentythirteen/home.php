<?php
    /**
     * The main template file.
     *
     * This is the most generic template file in a WordPress theme and one of the
     * two required files for a theme (the other being style.css).
     * It is used to display a page when nothing more specific matches a query.
     * For example, it puts together the home page when no home.php file exists.
     *
     * Learn more: http://codex.wordpress.org/Template_Hierarchy
     *
     * @package WordPress
     * @subpackage Twenty_Thirteen
     * @since Twenty Thirteen 1.0
     */
    get_header();
?>
<style>
    img.alignleft{
        display: block;
        float: left;
        padding-left: 5px;
    }
    img.alignright{
        float: right;
        max-width: 100%;
        display: block;
        padding-left: 5px;
    }
    
    
    
</style>
<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <div class="frontPage">
            <div class="frontPageArticles contentBox">
                <div class="frontPageArticleBox sideArticle">
                    <?php
                        $posts = get_posts( array('category' => 931,'posts_per_page' => 5));
                        $post = $posts[0];
                    ?>
                    <div class="articleDate"><?php echo ""; /*echo mysql2date('l, j M Y', $post->post_date);*/ ?></div>

                    <h3>Analyst Spotlight</h3>
                    <div class="articleContent">
                        <?php echo $post->post_excerpt ?>

                        <div class="readMore" data-url="<?php echo get_permalink($post);?>"></div>

                    </div>
                </div>

                <div class="frontPageArticleBox mainArticle">
                    <?php
                        $news =  get_posts( array('category' => 11,'posts_per_page' => 5));
                                                         $post = $news[0];
                    ?>
                    <div class="articleDate"><?php echo mysql2date('l, j M Y', $post->post_date); ?></div>
                    <h3><?php echo $post->post_title; ?></h3>
                    <div class="articleContent">
                        <p>
                            <?php echo nl2br($post->post_excerpt)?>
                        </p>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($post);?>"></div>
                </div>
                <div class="frontPageArticleBox sideArticle">
                    <?php
                        $monthlies =  get_posts(array('category' => 21,'posts_per_page' => 5));
                                                         $monthly = $monthlies[0];
                    ?>
                    <div class="articleDate"><?php echo "";/* Tuesday, Oct 1 , 2013 */ ?></div>
                    <h3>Top Financial News Stories</h3>
                    <div class="articleContent">
                        <?php
                            
                            $paragraphs = preg_split('/\n\n|\r\n\r\n/', strip_tags($monthly->post_excerpt), -1, PREG_SPLIT_NO_EMPTY);
                            if(count($paragraphs) <= 4){
                                echo  $monthly->post_excerpt;
                            } else {
                                $paragraph = nl2br($paragraphs[0].$paragraphs[1]);
                                echo $paragraph;
                            }
                            
                        ?>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($monthly);?>"></div>
                </div>

                <div class="frontPageArticleBox bigArticle">
                    <?php $post = $news[1];?>
                    <div class="articleDate"><?php echo mysql2date('l, j M Y', $post->post_date); ?></div>
                    <h3><?php echo $post->post_title; ?></h3>
                    <div class="articleContent">
                        <?php
                            
                            $paragraphs = preg_split('/\n\n|\r\n\r\n/', strip_tags($post->post_excerpt), -1, PREG_SPLIT_NO_EMPTY);
                             if(count($paragraphs) <= 4){
                                echo  $post->post_excerpt;
                            } else {
                                $paragraph = nl2br($paragraphs[0].$paragraphs[1]);
                                echo $paragraph;
                            }
                        ?>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($post);?>"></div>
                </div>

                <div class="frontPageArticleBox bigArticle">
                    <?php $post = $news[2];?>
                    <div class="articleDate"><?php echo mysql2date('l, j M Y', $post->post_date); ?></div>
                    <h3><?php echo $post->post_title; ?></h3>
                    <div class="articleContent">
                        <?php
                            
                            $paragraphs = preg_split('/\n\n|\r\n\r\n/', strip_tags($post->post_excerpt), -1, PREG_SPLIT_NO_EMPTY);
                             if(count($paragraphs) <= 4){
                                echo  nl2br($post->post_excerpt);
                            } else {
                                $paragraph = nl2br($paragraphs[0].$paragraphs[1]);
                                echo $paragraph;
                            }
                        ?>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($post);?>"></div>
                </div>
                 <div class="frontPageArticleBox sideArticle">
                    <?php
                        $monthlies =  get_posts(array('category' => 35,'posts_per_page' => 5));
                                                         $monthly = $monthlies[0];
                    ?>
                    <div class="articleDate"><?php echo "";/* Tuesday, Oct 1 , 2013 */ ?></div>
                    <h3>Hall of Fame/Shame</h3>
                    <div class="articleContent">
                        <?php
                            
                            $paragraphs = preg_split('/\n\n|\r\n\r\n/', strip_tags($monthly->post_excerpt), -1, PREG_SPLIT_NO_EMPTY);
                            if(count($paragraphs) <= 4){
                                echo  $monthly->post_excerpt;
                            } else {
                                $paragraph = nl2br($paragraphs[0].$paragraphs[1]);
                                echo $paragraph;
                            }
                            
                        ?>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($monthly);?>"></div>
                </div>
                <div class="frontPageArticleBox bigArticle">
                    <?php $post = $news[3];?>
                    <div class="articleDate"><?php echo mysql2date('l, j M Y', $post->post_date); ?></div>
                    <h3><?php echo $post->post_title; ?></h3>
                    <div class="articleContent">
                        <?php
                            
                            $paragraphs = preg_split('/\n\n|\r\n\r\n/', strip_tags($post->post_excerpt), -1, PREG_SPLIT_NO_EMPTY);
                             if(count($paragraphs) <= 2){
                                echo  $post->post_excerpt;
                            } else {
                                $paragraph = nl2br($paragraphs[0].$paragraphs[1]);
                                echo $paragraph;
                            }
                        ?>
                    </div>
                    <div class="readMore" data-url="<?php echo get_permalink($post);?>"></div>
                </div>

            </div>
            
        </div>

    </div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>