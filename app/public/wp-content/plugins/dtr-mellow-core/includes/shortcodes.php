<?php
/*------------------------------------------------------------
 * Table of Contents
 *
 * Portfolio Grid
 *------------------------------------------------------------*/

/*------------------------------------------------------------
 * Portfolio Grid
 * @since 1.0
 *------------------------------------------------------------*/
if ( ! function_exists( 'mellow_portfolio_grid_sc' ) ) {
	function mellow_portfolio_grid_sc( $atts, $content = null ) {
		extract ( shortcode_atts( array(
			'portfolio_style'	    => '',
			'image_size'	    	=> '',
			'image_size_default'	=> 'full',
			'img_width'	    		=> '600',
			'img_height'	    	=> '400',
			'filter'    			=> 'show', 
			'filter_align'    		=> 'dtr-filter-nav__center', 
			'categories'   			=> 'show',
			'heading'   			=> 'show',
			'heading_size'   		=> 'h5',
			'excerpt'   			=> 'show',
			'limit'     			=> '6',
			'order'	    			=> 'DESC',
			'orderby'   			=> 'date',
			'tax'       			=> '',
			'columns'				=> 'dtr-portfolio-grid-3col',
			'layout'				=> 'dtr-portfolio-fitrows',
            'border_radius'       	=> 'dtr-radius--rounded',
            'all_text'    			=> 'All',
			'link_text'    			=> 'View Case Study',
			'link_wrap'    			=> 'yes',
            'link_icon'    			=> 'yes',
			'target'         		=> '_blank',
		), $atts ) );
		
		$output = '';
		global $post;
		$args = array(
			'post_type'         => 'dtr_portfolio',
			'dtr_portfoliotags'	=> $tax,
			'posts_per_page'    => esc_attr( $limit ),
			'order'             => esc_attr( $order ), 
			'orderby'           => $orderby,
			'post_status'       => 'publish',
		);

		if( $filter == 'show' ){ 
		
			$portfolio_cats ='';
			if( $portfolio_cats && $portfolio_cats[0] == 0 ) {
				unset( $portfolio_cats[0] );
			}
			if( $portfolio_cats ){
				$args['tax_query'][] = array(
					'taxonomy'	=> 'dtr_portfoliotags',
					'terms' 	=> $portfolio_cats,
					'field' 	=> 'term_id',
				);
			}
		
			$loop = new WP_Query( $args );
			
			$portfolio_taxs = array();
			$filtered_taxs = array();
			
			if( is_array( $loop->posts ) && !empty( $loop->posts ) ) {
				foreach( $loop->posts as $loop_post ) {
					$post_taxs = wp_get_post_terms( $loop_post->ID, 'dtr_portfoliotags', array( "fields" => "all" ) );
					if( is_array( $post_taxs ) && !empty( $post_taxs ) ) {
						foreach( $post_taxs as $post_tax ) {
							if( is_array( $portfolio_cats ) && !empty( $portfolio_cats ) && ( in_array($post_tax->term_id, $portfolio_cats) || in_array( $post_tax->parent, $portfolio_cats )) )  						{
								$portfolio_taxs[urldecode( $post_tax->slug) ] = $post_tax->name;
							}
							if( empty( $portfolio_cats ) || !isset( $portfolio_cats ) ) {
								$portfolio_taxs[urldecode( $post_tax->slug )] = $post_tax->name;
							}
						}
					}
				}
			}

			$terms = get_terms( 'dtr_portfoliotags' );
			if( !empty( $terms ) && is_array( $terms ) ) {
				foreach( $terms as $term ) {
					if( is_array( $portfolio_taxs ) && array_key_exists ( urldecode( $term->slug ) , $portfolio_taxs ) ) {
						$filtered_taxs[urldecode( $term->slug )] = $term->name;
					}
				}
			}
            
			$portfolio_taxs = $filtered_taxs;
			$portfolio_category = get_terms( 'dtr_portfoliotags' );
			if( is_array( $portfolio_taxs ) && !empty( $portfolio_taxs ) ):
				$output .= '<div class="dtr-filter-nav-wrapper"><ul class="dtr-filter-nav ' . esc_attr( $filter_align ) . ' clearfix">';
                $output .= '<li><a class="dtr-filter-all active" data-filter="*" href="#">';
				$output .= '' . esc_html( $all_text ) . '';
				$output .= '</a></li>';
				foreach( $portfolio_taxs as $portfolio_tax_slug => $portfolio_tax_name ): 
				$output .= '<li>';
					$output .= '<a data-filter=".' .  $portfolio_tax_slug . '" href="#">' . $portfolio_tax_name  . '';
				$output .= '</a></li>';
				endforeach; 
				$output .= '</ul></div>';
			endif; 
		} // filter

		$query = new WP_Query( $args );
		
		if ( $query->have_posts() ) :	
			$output .= '<div class="dtr-portfolio-grid ' . esc_attr( $portfolio_style ) . ' ' . esc_attr( $layout ) . ' ' . esc_attr( $columns ) . '">';	
			while ( $query->have_posts() ) : $query->the_post();
				
				// add filter classes 
				$filter_classes = '';
				$item_cats = get_the_terms( $post->ID, 'dtr_portfoliotags' );
				if( $item_cats ):
				foreach( $item_cats as $item_cat ) {
					$filter_classes .= urldecode( $item_cat->slug ) . ' ';
				}
				endif;
				
				// variables
				$external_link = '';
				$post_id 					= get_the_ID();
				$thumb						= get_post_thumbnail_id(); 
				$img_url     				= wp_get_attachment_url( $thumb, 'full' ); 
				$thumb_title 				= get_the_title();
				$external_link				= get_post_meta( $post->ID, '_mellow_portfolio_external_link_url', true );
					
			$output .= '<div class="dtr-portfolio-item isotope-item '. esc_attr( $filter_classes ) . ' all"><div class="dtr-portfolio-item__wrapper ' . esc_attr( $border_radius ) . '">';
				
					// wrapping link
					if ( $link_wrap == 'yes' ) { 
						if ( $external_link != '' ) { 
							$output .= '<a class="dtr-portfolio-item__wrap-link" href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>';
						} else {
							$output .= '<a class="dtr-portfolio-item__wrap-link" href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '"></a>';	
						}
					}

                    // image width
					if( $image_size == 'img_custom' && $img_width == '' ){
						$return_width = '600';
					} else {
						$return_width = $img_width;
					}

					// image height
					if( $image_size == 'img_custom' && $img_height == '' ){
						$return_height = '400';
					} else {
						$return_height = $img_height;
					}

					// image sizes
					if( ! empty( $img_url ) && ! empty( $return_width ) && ! empty( $return_height ) && $image_size == 'img_custom' && has_post_thumbnail() ) {  
						$image_resize   = aq_resize( $img_url, $return_width, $return_height, true );
						$return_image = '<img src="' . esc_url( $image_resize ) . '" alt="' . esc_attr( $thumb_title ) . '"/>';
					} else { 
						$return_image = '' . get_the_post_thumbnail ( $post_id, $image_size_default ) . '';
					}
					
					// image output
					$output .=  '<div class="dtr-portfolio-item__img"><div class="dtr-overlay"></div>';
						if( has_post_thumbnail() ) { 
							$output .=  $return_image;
						} else {
							$output .=  '<div class="dtr-portfolio-item__img no-portfolio-img"></div>';
						}

						// link icon
						if ( $link_icon == 'yes' ) { 
							if ( $external_link != '' ) { 
									$output .= '<a class="dtr-portfolio-item__link" href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">' . esc_html( $link_text ) . '</a>';
							} else {
									$output .= '<a class="dtr-portfolio-item__link" href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">' . esc_html( $link_text ) . '</a>'; 
							}
						} // link icon

						// content on hover
						if( $portfolio_style == 'portfolio-style1' ) { 
							$output .=  '<div class="dtr-portfolio-item__content">';	

								// categories
								if( $categories == 'show' ){ 
									$item_terms = get_the_terms( get_the_ID(), 'dtr_portfoliotags' );
									if ( ! empty( $item_terms ) && ! is_wp_error( $item_terms ) ) {
										$output .= '<div class="dtr-portfolio-item__categories">';
										foreach ( $item_terms as $term ) {
											$output .= '<span class="dtr-portfolio-item__category">' . esc_html( $term->name ) . '</span> ';
										}
										$output .= '</div>';
									}
								} // categories
								
								// heading
								if( $heading == 'show' ){ 
									$output .= '<' . $heading_size . ' class="dtr-portfolio-item__heading">';
								
									if ( $external_link != '' ) { 
											$output .= '<a href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">';
									} else {
											$output .= '<a href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">'; 
									}									
									$output .= '' . get_the_title() . '';
									$output .= '</a>';
									$output .= '</' . $heading_size . '>';
								}// heading
								
							$output .= '</div>';
						}
						// content on hover

					$output .=  '</div>';

					// content
					if( $portfolio_style == '' ) { 
						$output .=  '<div class="dtr-portfolio-item__content">';	
							// Get and display categories
							if( $categories == 'show' ){ 
								$item_terms = get_the_terms( get_the_ID(), 'dtr_portfoliotags' );
								if ( ! empty( $item_terms ) && ! is_wp_error( $item_terms ) ) {
									$output .= '<div class="dtr-portfolio-item__categories">';
									foreach ( $item_terms as $term ) {
										$output .= '<span class="dtr-portfolio-item__category">' . esc_html( $term->name ) . '</span> ';
									}
									$output .= '</div>';
								}
							}

							// heading
							if( $heading == 'show' ){ 
								$output .= '<' . $heading_size . ' class="dtr-portfolio-item__heading">';
							
								if ( $external_link != '' ) { 
										$output .= '<a href="' . esc_url( $external_link ) . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">';
								} else {
										$output .= '<a href="' . get_the_permalink() . '" target="'. esc_attr( $target ) . '" aria-label="' . get_the_title() . '">'; 
								}									
								$output .= '' . get_the_title() . '';
								$output .= '</a>';
								$output .= '</' . $heading_size . '>';
							}// heading
						$output .= '</div>';
					}
					// content
				
					if( $excerpt == 'show' && has_excerpt() ){ 
						$output .=  '<p class="dtr-portfolio-item__excerpt">' . get_the_excerpt() . '</p>';
					} 

				$output .= '</div></div>'; // dtr-portfolio-item	
			endwhile;
			$output .= '</div>';
			wp_reset_postdata();
		endif;
		return $output;
	}
}
add_shortcode('dtr_portfolio_grid', 'mellow_portfolio_grid_sc');