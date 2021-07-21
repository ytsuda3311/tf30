<?php get_header(); ?>

	<!-- content -->
	<div id="content">
		<div class="inner">

			<!-- primary -->
			<main id="primary">

                <?php if ( function_exists( 'bcn_display' ) ) : ?>
                <!-- breadcrumb -->
                <div class="breadcrumb">
                    <?php bcn_display(); //BreadcrumbNavXTのパンくずを表示するための記述 ?>
                </div><!-- /breadcrumb -->
                <?php endif; ?>


                <?php
                //記事があればentriesブロック以下を表示
                if ( have_posts() ) : 
                while ( have_posts() ) :
                the_post();
                ?>

				<!-- entry -->
				<article <?php post_class( array( 'entry' ) ); ?>>

					<!-- entry-header -->
					<div class="entry-header">
                        <!-- trueを引数として渡すとリンク付き、falseを渡すとリンクなし -->
						<div class="entry-label"><?php my_the_post_category( true ); ?></div><!-- /entry-item-tag -->

						<h1 class="entry-title"><?php the_title(); ?></h1><!-- /entry-title -->

						<!-- entry-meta -->
						<div class="entry-meta">
							<time class="entry-published" datetime="<?php the_time( 'c' ); ?>">公開日 <?php the_time( 'Y/n/j' ); ?></time>
                            <?php if ( get_the_modified_time( 'Y-m-d' ) !== get_the_time( 'Y-m-d' ) ) : ?>
							<time class="entry-updated" datetime="<?php the_modified_time( 'c' ); ?>">最終更新日 <?php the_modified_time( 'Y/n/j' ); ?></time>
                            <?php endif; ?>
						</div><!-- /entry-meta -->

						<!-- entry-img -->
						<div class="entry-img">
                            <?php
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail( 'large' );
                            }
                            ?>
						</div><!-- /entry-img -->

					</div><!-- /entry-header -->

					<!-- entry-body -->
					<div class="entry-body">
                        <?php
                        //本文の表示
                        the_content(); ?>
                        <pre>
                            <code>
&lt;!-- header-nav --&gt;
&lt;nav class=&quot;header-nav&quot;&gt;
	&lt;div class=&quot;inner&quot;&gt;
		&lt;ul class=&quot;header-list&quot;&gt;
			&lt;li class=&quot;m_icon1 menu-item&quot;&gt;&lt;a href=&quot;#&quot;&gt;メニュー1&lt;/a&gt;&lt;/li&gt;
			&lt;li class=&quot;m_icon2 menu-item&quot;&gt;&lt;a href=&quot;#&quot;&gt;メニュー2&lt;/a&gt;&lt;/li&gt;
			&lt;li class=&quot;m_icon3 menu-item&quot;&gt;&lt;a href=&quot;#&quot;&gt;メニュー3&lt;/a&gt;&lt;/li&gt;
			&lt;li class=&quot;m_icon4 menu-item&quot;&gt;&lt;a href=&quot;#&quot;&gt;メニュー4&lt;/a&gt;&lt;/li&gt;
			&lt;li class=&quot;m_icon5 menu-item&quot;&gt;&lt;a href=&quot;#&quot;&gt;メニュー5&lt;/a&gt;&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/div&gt;&lt;!-- /inner --&gt;
&lt;/nav&gt;&lt;!-- header-nav --&gt;
                            </code>
                        </pre>
                        <?php
                        //改ページを有効にするための記述
                        wp_link_pages(
                            array(
                                'before' => '<nav class="entry-links">',
                                'after' => '</nav>',
                                'link_before' => '',
                                'link_after' => '',
                                'next_or_number' => 'number',
                                'separator' => '',
                            )
                        );
                        ?>
                        <?php echo do_shortcode('[btn link="http://tf30.local/contact-page/"]お問い合わせはこちら[/btn]')?>
					</div><!-- /entry-body -->


                    <?php $post_tags = get_the_tags(); ?>
					<div class="entry-tag-items">
						<div class="entry-tag-head">タグ</div><!-- /entry-tag-head -->
                        <?php my_get_post_tags(); ?>
					</div><!-- /entry-tag-items -->


					<?php get_template_part('template-parts/related') ?>


				</article> <!-- /entry -->

                <?php
                endwhile;
                endif;
                ?>

			</main><!-- /primary -->

			<?php get_sidebar(); ?>


		</div><!-- /inner -->
	</div><!-- /content -->

<?php get_footer(); ?>