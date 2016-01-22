<?php
/*
 Plugin Name: Counterize plugin: Outlinks
 Plugin URI: http://www.gabsoftware.com/products/scripts/counterize/plugins/outlinks
 Description: Display some information about the outlinks for the Counterize plugin
 Version: 3.1.5
 Author: Gabriel Hautclocq
 Author URI: http://www.gabsoftware.com/
 License: ISC
*/


// Security check. We do not want to be able to access our plugin directly.
if( !defined( 'WP_PLUGIN_DIR') )
{
	die( "There is nothing to see here." );
}

//removes the plugin update notification
add_filter( 'site_transient_update_plugins', 'counterize_plugin_outlinks_disable_update_check' );

// Security check #2. We do not want to be able to load the plugin if Counterize isn't loaded before.
if( !defined( 'COUNTERIZE_CHECK') )
{
	add_action('admin_notices', 'counterize_plugin_outlinks_admin_notice');
	return;
}

/* constants */

// Counterize Outlinks plugin text domain
define( 'COUNTERIZE_PLUGIN_OUTLINKS_TD', COUNTERIZE_TD );

// Absolute path of the plugin from the server view
define( 'COUNTERIZE_PLUGIN_OUTLINKS_DIR', WP_PLUGIN_DIR . '/' . plugin_basename( dirname( __FILE__) ) );

// Public URL of the plugin
define( 'COUNTERIZE_PLUGIN_OUTLINKS_URL', WP_PLUGIN_URL . '/' . plugin_basename( dirname( __FILE__) ) );

/*
 * Prevents WordPress from displaying wrong update notifications because
 * this plugin is located in the same directory as Counterize
 */
function counterize_plugin_outlinks_disable_update_check( $value = '' )
{
	if( ( isset( $value->response ) ) && ( count( $value->response ) ) )
	{
		$my_plugin = plugin_basename( dirname( __FILE__) ) . '/' . basename( __FILE__ );

		// Get the list cut current active plugins
		$active_plugins = get_option('active_plugins');

		if( $active_plugins )
		{
			//  Here we start to compare the $value->response
			//  items checking each against the active plugins list.
			if( array_key_exists( $my_plugin, $value->response ) )
			{
				unset( $value->response[ $my_plugin ] );
			}
		}
	}
	return $value;
}

/*
 * This function will be called if Counterize was not found or was not activated.
 */
function counterize_plugin_outlinks_admin_notice()
{
	global $pagenow;
	if( current_user_can( 'install_plugins' ) && $pagenow == 'plugins.php' )
	{
		echo '<div class="error"><p>';
		echo 'The Counterize plugin "Outlinks" could not find Counterize. Please install and activate the <a target="_blank" href="plugin-install.php?tab=plugin-information&amp;plugin=counterize&amp;TB_iframe=false&amp;width=600&amp;height=550">Counterize plugin</a> first.';
		echo '</p></div>';
	}
}

class Counterize_Plugin_Outlinks
{
	/*
	 * Our plugin constructor
	 */
	function __construct()
	{
		// Place your add_actions and add_filters here
		add_action( 'init', array( &$this, 'counterize_plugin_outlinks_init_callback' ) );

	} // end of constructor

	/*
	 * Place your plugin initialization code here
	 * For example, load your plugin translations here, not before.
	 */
	public function counterize_plugin_outlinks_init_callback()
	{
		//increment the plugin counter
		global $counterize_plugin_count;
		$counterize_plugin_count++;

		// Load the plugin localization (.mo files) located
		// in the plugin "lang" subdirectory
		if( function_exists( 'load_plugin_textdomain' ) )
		{
			load_plugin_textdomain(
				COUNTERIZE_PLUGIN_OUTLINKS_TD,
				COUNTERIZE_PLUGIN_OUTLINKS_DIR . '/lang',
				plugin_basename( dirname(__FILE__) ) . '/lang'
			);
		}

		//add a submenu page for our plugin
		add_filter( 'counterize_dashboard_add_submenu', array( &$this, 'counterize_dashboard_add_submenu_outlinks_callback' ), 10, 2 );
		add_action( 'counterize_show_data', array( &$this, 'counterize_show_data_outlinks' ), 10, 3 );
		add_filter( 'counterize_check_data', array( &$this, 'counterize_check_data_outlinks' ), 10, 1 );

		//add a submenu in the Counterize toolbar
		add_action( 'counterize_toolbar_add_submenu', array( &$this, 'counterize_toolbar_add_submenu_callback' ), 10, 1 );

		//add shortcodes
		add_filter( 'counterize_shortcodes', array( &$this, 'counterize_plugin_outlinks_shortcodes_callback' ), 10, 3 );

		//filters for the Counterize button in TinyMCE
		add_filter( 'counterize_mce_js_type_filter', array( &$this, 'counterize_mce_js_type_filter_callback' ), 10, 1 );

		//filter for the report option in Counterize settings
		add_filter( 'counterize_report_what_filter', array( &$this, 'counterize_report_what_filter_callback' ), 10, 1 );

		//generate the report
		add_filter( 'counterize_report', array( &$this, 'counterize_plugin_report_callback' ), 10, 2 );

	} // end of function


	public function counterize_dashboard_add_submenu_outlinks_callback( $counterize_dashboard_handles, $capability )
	{
		$counterize_dashboard_handles['outlinks'] = add_submenu_page
		(
			COUNTERIZE_MENU_SLUG,
			__( 'Counterize', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . ' - ' . __( 'Dashboard', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . ' - ' . __( 'Outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
			__( 'Outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
			$capability,
			'counterize_dashboard_outlinks',
			array( &$this, 'counterize_display_dashboard_outlinks_page_callback' )
		);

		//load the help tabs
		add_action( 'load-' . $counterize_dashboard_handles['outlinks'], array( &$this, 'counterize_add_help_tabs_to_outlinks_callback' ) );

		//insert the stylesheet and script
		add_action( "admin_print_scripts-{$counterize_dashboard_handles['outlinks']}", 'counterize_javascript_head_callback' );
		add_action( "admin_print_styles-{$counterize_dashboard_handles['outlinks']}" , 'counterize_stylesheet_head_callback' );

		return $counterize_dashboard_handles;
	}

	public function counterize_toolbar_add_submenu_callback( $wp_admin_bar )
	{
		// add the All stats node to a our parent item
		$args = array
		(
			'id'     => 'counterize_toolbar_outlinks',
			'title'  => '<span class="ab-icon" style="margin-top: 3px; margin-right: 5px;"><img src="' . COUNTERIZE_PLUGIN_URL . '/outlinks_16x16.png" alt="Counterize icon" /></span>'
						. __( 'Outlinks' ),
			'href'   => get_admin_url( null, 'admin.php?page=counterize_dashboard_outlinks' ), // link to the related Counterize Dashboard entry
			'parent' => COUNTERIZE_TOOLBAR_STATS_GROUP_SLUG
		);
		$wp_admin_bar->add_node( $args );
	}

	/*
	 * display help tabs
	 */
	public function counterize_add_help_tabs_to_outlinks_callback()
	{
		$screen = get_current_screen();
		$screen->add_help_tab
		(
			array
			(
				'id'      => 'counterize-outlinks-plugin-help', // This should be unique for the screen.
				'title'   => __( 'Most clicked outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
				'content' => __( '<p>Displays a diagram of the most clicked outlinks.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>An outlink is a link that goes outside your website. When a visitor click such a link, he will leave your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>This is useful to find where your visitors go after they visited your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
				// Use 'callback' instead of 'content' for a function callback that renders the tab content.
			)
		);
		$screen->add_help_tab
		(
			array
			(
				'id'      => 'counterize-outlinks24h-plugin-help', // This should be unique for the screen.
				'title'   => __( 'Most clicked outlinks for the last 24 hours', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
				'content' => __( '<p>Displays a diagram of the most clicked outlinks, for the last 24 hours only.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>An outlink is a link that goes outside your website. When a visitor click such a link, he will leave your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>This is useful to find where your visitors go after they visited your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
				// Use 'callback' instead of 'content' for a function callback that renders the tab content.
			)
		);
		$screen->add_help_tab
		(
			array
			(
				'id'      => 'counterize-exitpages-plugin-help', // This should be unique for the screen.
				'title'   => __( 'Exit pages', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
				'content' => __( '<p>Displays a diagram of the exit pages.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>An exit page is a page on your website from where an outlink had been clicked.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>This is useful to know at which page your visitors leave your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
				// Use 'callback' instead of 'content' for a function callback that renders the tab content.
			)
		);
		$screen->add_help_tab
		(
			array
			(
				'id'      => 'counterize-exitpages24h-plugin-help', // This should be unique for the screen.
				'title'   => __( 'Exit pages for the last 24 hours', COUNTERIZE_PLUGIN_OUTLINKS_TD ),
				'content' => __( '<p>Displays a diagram of the exit pages, for the last 24 hours only.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>An exit page is a page on your website from where an outlink had been clicked.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
						. __( '<p>This is useful to know at which page your visitors leave your website.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
				// Use 'callback' instead of 'content' for a function callback that renders the tab content.
			)
		);
		$screen->set_help_sidebar
		(
			__( '<p>Choose a tab to learn more about the related diagram.</p>', COUNTERIZE_PLUGIN_OUTLINKS_TD )
		);
	}

	public function counterize_display_dashboard_outlinks_page_callback()
	{
		// Amount to pass as option to the graphs...
		$amount2 = counterize_get_option( 'amount2' );
		if( $amount2 == '' || $amount2 == ' ' || ! is_numeric( $amount2 ) )
		{
			$amount2 = 10;
		}

		echo '
		<div id="icon-plugins" class="icon32"></div>
		<h1>' . __( 'Counterize', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . ' - ' . __( 'Dashboard', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . ' - ' . __( 'Outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . '</h1>
		';

		$this->counterize_show_data_outlinks( true, $amount2, true );

		//Print the footer
		counterize_pagefooter();
	}

	public function counterize_show_data_outlinks( $admin = false, $amount2 = 10, $directcall = true )
	{
		if( $directcall )
		{
			?>

			<p><?php _e( 'Need help about this page? Click on <strong>Help</strong> on the top of this page!', COUNTERIZE_PLUGIN_OUTLINKS_TD ); ?></p>

			<?php
			if( ! counterize_getamount() )
			{
				_e( "There's no data in the database - You can't see stats until you have data. ", COUNTERIZE_PLUGIN_OUTLINKS_TD );
				return;
			}
		}
		?>

		<!-- Outlinks -->

		<div class="wrap">

			<?php $this->counterize_render_most_clicked_outlinks( $amount2 ); ?>

		</div>

		<div class="wrap">

			<?php $this->counterize_render_most_clicked_outlinks24hrs( $amount2 ); ?>

		</div>

		<div class="wrap">

			<?php $this->counterize_render_exit_pages( $amount2 ); ?>

		</div>

		<div class="wrap">

			<?php $this->counterize_render_exit_pages24hrs( $amount2 ); ?>

		</div>

		<?php
	}







	// get the most clicked outlinks data feed
	public function counterize_feed_most_clicked_outlinks( $number = 10, $header_override = '' )
	{
		global $wpdb;
		$number = $wpdb->prepare( "%d", $number );
		$sql = "SELECT `count` , `url`, `url` AS label "
			. " FROM `" . counterize_outlinksTable() . "`"
			. " ORDER BY `count` DESC "
			. " LIMIT {$number}";
		$rows = $wpdb->get_results( $sql );

		$title = __( 'Most clicked outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		if( ! empty( $header_override ) )
		{
			$title = $header_override;
		}

		$feed = new CounterizeFeed( $title, __( 'URL', COUNTERIZE_PLUGIN_OUTLINKS_TD ) );

		foreach( $rows as $row )
		{
			$feed->add_item_3( $row->count, $row->label, $row->url );
		}
		unset( $rows, $sql );
		$feed->refresh_percentages();

		return $feed;
	}

	// render the most clicked outlinks data feed
	public function counterize_render_most_clicked_outlinks( $number = 10, $print_header = true, $header_override = '' )
	{
		$feed = $this->counterize_feed_most_clicked_outlinks( $number, $header_override );
		$feed->render_feed_vertical( false, '100%', true, true, false, $print_header );
	}








	// get the most clicked outlinks data feed for the last 24 hours
	public function counterize_feed_most_clicked_outlinks24hrs( $number = 10, $header_override = '' )
	{
		global $wpdb;
		$number = $wpdb->prepare( "%d", $number );
		$onedayago = date( 'Y-m-d H:i:s', time() - 86400 );
		$sql = "SELECT COUNT( m.`id` ) AS `count`, o.`url` AS url, o.`url` AS label "
			. " FROM `" . counterize_logTable() . "` m, `" . counterize_outlinksTable() . "` o "
			. " WHERE m.`outlinkID` = o.`outlinkID`"
			. " AND m.`timestamp` >= '{$onedayago}'"
			. " GROUP BY o.`url` "
			. " ORDER BY `count` DESC "
			. " LIMIT {$number}";
		$rows = $wpdb->get_results( $sql );

		$title = __( 'Most clicked outlinks for the last 24 hours', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		if( ! empty( $header_override ) )
		{
			$title = $header_override;
		}

		$feed = new CounterizeFeed( $title, __( 'URL', COUNTERIZE_PLUGIN_OUTLINKS_TD ) );

		foreach( $rows as $row )
		{
			$feed->add_item_3( $row->count, $row->label, $row->url );
		}
		unset( $rows, $sql, $number, $onedayago );
		$feed->refresh_percentages();

		return $feed;
	}

	// render the most clicked outlinks data feed for the last 24 hours
	public function counterize_render_most_clicked_outlinks24hrs( $number = 10, $print_header = true, $header_override = '' )
	{
		$feed = $this->counterize_feed_most_clicked_outlinks24hrs( $number, $header_override );
		$feed->render_feed_vertical( false, '100%', true, true, false, $print_header );
	}









	// get the exit pages data feed
	public function counterize_feed_exit_pages( $number = 10, $header_override = '' )
	{
		global $wpdb;
		$number = $wpdb->prepare( "%d", $number );
		$sql = "SELECT COUNT( m.`id` ) AS `count`, p.`url` AS url, p.`url` AS label "
			. " FROM `" . counterize_logTable() . "` m, `" . counterize_pageTable() . "` p "
			. " WHERE m.`pageID` = p.`pageID`"
			. " AND m.`outlinkID` > 0 "
			. " GROUP BY p.`url` "
			. " ORDER BY `count` DESC "
			. " LIMIT {$number}";
		$rows = $wpdb->get_results( $sql );

		$title = __( 'Exit pages', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		if( ! empty( $header_override ) )
		{
			$title = $header_override;
		}

		$feed = new CounterizeFeed( $title, __( 'URL', COUNTERIZE_PLUGIN_OUTLINKS_TD ) );

		foreach( $rows as $row )
		{
			$feed->add_item_3( $row->count, $row->label, $row->url );
		}
		unset( $rows, $sql );
		$feed->refresh_percentages();

		return $feed;
	}

	// render the exit pages data feed
	public function counterize_render_exit_pages( $number = 10, $print_header = true, $header_override = '' )
	{
		$feed = $this->counterize_feed_exit_pages( $number, $header_override );
		$feed->render_feed_vertical( false, '100%', true, true, false, $print_header );
	}















	// get the exit pages data feed of the last 24 hours
	public function counterize_feed_exit_pages24hrs( $number = 10, $header_override = '' )
	{
		global $wpdb;
		$number = $wpdb->prepare( "%d", $number );
		$onedayago = date( 'Y-m-d H:i:s', time() - 86400 );
		$sql = "SELECT COUNT( m.`id` ) AS `count`, p.`url` AS url, p.`url` AS label "
			. " FROM `" . counterize_logTable() . "` m, `" . counterize_pageTable() . "` p "
			. " WHERE m.`pageID` = p.`pageID`"
			. " AND m.`outlinkID` > 0 "
			. " AND m.`timestamp` >= '{$onedayago}'"
			. " GROUP BY p.`url` "
			. " ORDER BY `count` DESC "
			. " LIMIT {$number}";
		$rows = $wpdb->get_results( $sql );

		$title = __( 'Exit pages of the last 24 hours', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		if( ! empty( $header_override ) )
		{
			$title = $header_override;
		}

		$feed = new CounterizeFeed( $title, __( 'URL', COUNTERIZE_PLUGIN_OUTLINKS_TD ) );

		foreach( $rows as $row )
		{
			$feed->add_item_3( $row->count, $row->label, $row->url );
		}
		unset( $rows, $sql );
		$feed->refresh_percentages();

		return $feed;
	}

	// render the exit pages data feed of the last 24 hours
	public function counterize_render_exit_pages24hrs( $number = 10, $print_header = true, $header_override = '' )
	{
		$feed = $this->counterize_feed_exit_pages24hrs( $number, $header_override );
		$feed->render_feed_vertical( false, '100%', true, true, false, $print_header );
	}










	public function counterize_check_data_outlinks( $data )
	{
		//<!-- counterize_stats_outlinks_nb --> : Shows a list of the nb most clicked outlinks
		$data = counterize_check_data
		(
			$data, '/(\<\!\-|\#)\-\s*counterize_stats_outlinks_([0-9]+)\s*\-(\-\>|\#)/', array( &$this, 'counterize_render_most_clicked_outlinks' ), 1
		);

		//<!-- counterize_stats_outlinks_24hrs_nb --> : Shows a list of the nb most clicked outlinks during the last 24 hours
		$data = counterize_check_data
		(
			$data, '/(\<\!\-|\#)\-\s*counterize_stats_outlinks_24hrs_([0-9]+)\s*\-(\-\>|\#)/', array( &$this, 'counterize_render_most_clicked_outlinks24hrs' ), 1
		);

		//<!-- counterize_stats_exitpages_nb --> : Shows a list of the nb most frequent exit pages
		$data = counterize_check_data
		(
			$data, '/(\<\!\-|\#)\-\s*counterize_stats_exitpages_([0-9]+)\s*\-(\-\>|\#)/', array( &$this, 'counterize_render_exit_pages' ), 1
		);

		//<!-- counterize_stats_exitpages_24hrs_nb --> : Shows a list of the nb most frequent exit pages during the last 24 hours
		$data = counterize_check_data
		(
			$data, '/(\<\!\-|\#)\-\s*counterize_stats_exitpages_24hrs_([0-9]+)\s*\-(\-\>|\#)/', array( &$this, 'counterize_render_exit_pages24hrs' ), 1
		);

		return $data;
	}


	public function counterize_plugin_outlinks_shortcodes_callback( $output, $attr, $content = null )
	{
		extract( shortcode_atts( array
		(
			'type'         => 'copyright',
			'items'        => 10,
			'subitems'     => 15,
			'version'      => 'yes',
			'collapsible'  => 'no',
			'print_header' => 'yes',
			'header'       => '',
			'period'       => '24h',
			'tn_width'     => 50,
			'tn_height'    => 50
		), $attr ) );

		ob_start();
		if( $type == 'outlinks' )
		{
			if( $period == '24h' )
			{
				$this->counterize_render_most_clicked_outlinks24hrs( $items, $print_header === 'yes', $header );
			}
			else
			{
				$this->counterize_render_most_clicked_outlinks( $items, $print_header === 'yes', $header );
			}
		}
		elseif( $type == 'exitpages' )
		{
			if( $period == '24h' )
			{
				$this->counterize_render_exit_pages24hrs( $items, $print_header === 'yes', $header );
			}
			else
			{
				$this->counterize_render_exit_pages( $items, $print_header === 'yes', $header );
			}
		}

		$tmp = ob_get_contents();
		if( ! empty( $tmp ) )
		{
			$output = $tmp;
		}
		ob_end_clean();
		return $output;
	}

	public function counterize_mce_js_type_filter_callback( $content )
	{
		return $content . '										<option value=\"outlinks\">' . __( 'Outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . '</option>\
										<option value=\"exitpages\">' . __( 'Exit pages', COUNTERIZE_PLUGIN_OUTLINKS_TD ) . '</option>\
';
	}

	public function counterize_report_what_filter_callback( $what )
	{
		$what['outlinks'] = __( 'Outlinks', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		$what['exitpages'] = __( 'Exit pages', COUNTERIZE_PLUGIN_OUTLINKS_TD );
		return $what;
	}

	public function counterize_plugin_report_callback( $output, $what )
	{
		$items = counterize_get_option( 'amount2' );
		ob_start();
		if( in_array( 'outlinks', $what ) )
		{
			$this->counterize_render_most_clicked_outlinks( $items );
			$this->counterize_render_most_clicked_outlinks24hrs( $items );
		}
		if( in_array( 'exitpages', $what ) )
		{
			$this->counterize_render_exit_pages( $items );
			$this->counterize_render_exit_pages24hrs( $items );
		}
		$tmp = ob_get_contents();
		if( ! empty( $tmp ) )
		{
			$output .= $tmp;
		}
		ob_end_clean();
		return $output;
	}

}

/*
 * Instanciate a new instance of Counterize_Plugin_Outlinks
 */
$counterize_plugins['outlinks'] = new Counterize_Plugin_Outlinks();

?>