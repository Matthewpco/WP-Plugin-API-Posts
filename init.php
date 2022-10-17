<?php


function headless_apidata_function() {
	

	
    // API HTML output
    $string .= '

    <div class="hl-apidata-container">

    </div>
    ';
      
	
    // Code returned
    return $string; 
    }


function headless_apidata_enqueue_scripts() {
	/**
 * Registers and enqueue styles and scripts
 */
	wp_register_style( 'wp-headless-apidata', plugins_url ( 'css/styles.css', __FILE__ ));
	wp_enqueue_style( 'wp-headless-apidata' );
	
	wp_register_script( 'wp-headless-apidata-script' , plugins_url ('js/script.js', __FILE__ ));
	wp_enqueue_script( 'wp-headless-apidata-script' );
	//wp_localize_script( 'wp-headless-apidata-script', 'php_vars', $spcAtt );
	
}


function defer_headlessapi_scripts( $tag, $handle, $src ) {
  $defer = array( 
    'wp-headless-apidata-script'
  );
  if ( in_array( $handle, $defer ) ) {
     return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
  }
    
    return $tag;
} 
add_filter( 'script_loader_tag', 'defer_headlessapi_scripts', 10, 3 );
