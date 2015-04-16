<?php

// load wordpress
require_once('get_wp.php');

class zilla_shortcodes
{
	var	$conf;
	var	$popup;
	var	$params;
	var	$shortcode;
	var $cparams;
	var $cshortcode;
	var $popup_title;
	var $no_preview;
	var $has_child;
	var	$output;
	var	$errors;

	// --------------------------------------------------------------------------

	function __construct( $popup )
	{
		if( file_exists( dirname(__FILE__) . '/config.php' ) )
		{
			$this->conf = dirname(__FILE__) . '/config.php';
			$this->popup = $popup;
			
			$this->formate_shortcode();
		}
		else
		{
			$this->append__rror('Config file does not exist');
		}
	}
	
	// --------------------------------------------------------------------------
	
	function formate_shortcode()
	{
		// get config file
		require_once( $this->conf );
		
		if( isset( $zilla_shortcodes[$this->popup]['child_shortcode'] ) )
			$this->has_child = true;
		
		if( isset( $zilla_shortcodes ) && is_array( $zilla_shortcodes ) )
		{
			// get shortcode config stuff
			$this->params = $zilla_shortcodes[$this->popup]['params'];
			$this->shortcode = $zilla_shortcodes[$this->popup]['shortcode'];
			$this->popup_title = $zilla_shortcodes[$this->popup]['popup_title'];
			
			// adds stuff for js use			
			$this->append_output( "\n" . '<div id="_zilla_shortcode" class="hidden">' . $this->shortcode . '</div>' );
			$this->append_output( "\n" . '<div id="_zilla_popup" class="hidden">' . $this->popup . '</div>' );
			
			if( isset( $zilla_shortcodes[$this->popup]['no_preview'] ) && $zilla_shortcodes[$this->popup]['no_preview'] )
			{
				//$this->append_output( "\n" . '<div id="_zilla_preview" class="hidden">false</div>' );
				$this->no_preview = true;		
			}
			
			// filters and excutes params
			foreach( $this->params as $pkey => $param )
			{
				// prefix the fields names and ids with zilla_
				$pkey = 'zilla_' . $pkey;
				
				// popup form row start
				$row_start  = '<tbody>' . "\n";
				$row_start .= '<tr class="form-row">' . "\n";
				$row_start .= '<td class="label">' . $param['label'] . '</td>' . "\n";
				$row_start .= '<td class="field">' . "\n";
				
				// popup form row end
				$row__nd	= '<span class="zilla-form-desc">' . $param['desc'] . '</span>' . "\n";
				$row__nd   .= '</td>' . "\n";
				$row__nd   .= '</tr>' . "\n";					
				$row__nd   .= '</tbody>' . "\n";
				
				switch( $param['type'] )
				{
					case 'text' :
						
						// prepare
						$output  = $row_start;
						$output .= '<input type="text" class="zilla-form-text zilla-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row__nd;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'textarea' :
						
						// prepare
						$output  = $row_start;
						$output .= '<textarea rows="10" cols="30" name="' . $pkey . '" id="' . $pkey . '" class="zilla-form-textarea zilla-input">' . $param['std'] . '</textarea>' . "\n";
						$output .= $row__nd;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'select' :
						
						// prepare
						$output  = $row_start;
						$output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="zilla-form-select zilla-input">' . "\n";
						
						foreach( $param['options'] as $value => $option )
						{
							$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
						}
						
						$output .= '</select>' . "\n";
						$output .= $row__nd;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'checkbox' :
						
						// prepare
						$output  = $row_start;
						$output .= '<label for="' . $pkey . '" class="zilla-form-checkbox">' . "\n";
						$output .= '<input type="checkbox" class="zilla-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' />' . "\n";
						$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row__nd;
						
						// append
						$this->append_output( $output );
						
						break;
				}
			}
			
			// checks if has a child shortcode
			if( isset( $zilla_shortcodes[$this->popup]['child_shortcode'] ) )
			{
				// set child shortcode
				$this->cparams = $zilla_shortcodes[$this->popup]['child_shortcode']['params'];
				$this->cshortcode = $zilla_shortcodes[$this->popup]['child_shortcode']['shortcode'];
			
				// popup parent form row start
				$prow_start  = '<tbody>' . "\n";
				$prow_start .= '<tr class="form-row has-child">' . "\n";
				$prow_start .= '<td><a href="#" id="form-child-add" class="button-secondary">' . $zilla_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . "\n";
				$prow_start .= '<div class="child-clone-rows">' . "\n";
				
				// for js use
				$prow_start .= '<div id="_zilla_cshortcode" class="hidden">' . $this->cshortcode . '</div>' . "\n";
				
				// start the default row
				$prow_start .= '<div class="child-clone-row">' . "\n";
				$prow_start .= '<ul class="child-clone-row-form">' . "\n";
				
				// add $prow_start to output
				$this->append_output( $prow_start );
				
				foreach( $this->cparams as $cpkey => $cparam )
				{
				
					// prefix the fields names and ids with zilla_
					$cpkey = 'zilla_' . $cpkey;
					
					// popup form row start
					$crow_start  = '<li class="child-clone-row-form-row">' . "\n";
					$crow_start .= '<div class="child-clone-row-label">' . "\n";
					$crow_start .= '<label>' . $cparam['label'] . '</label>' . "\n";
					$crow_start .= '</div>' . "\n";
					$crow_start .= '<div class="child-clone-row-field">' . "\n";
					
					// popup form row end
					$crow__nd	  = '<span class="child-clone-row-desc">' . $cparam['desc'] . '</span>' . "\n";
					$crow__nd   .= '</div>' . "\n";
					$crow__nd   .= '</li>' . "\n";
					
					switch( $cparam['type'] )
					{
						case 'text' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<input type="text" class="zilla-form-text zilla-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$coutput .= $crow__nd;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'textarea' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<textarea rows="10" cols="30" name="' . $cpkey . '" id="' . $cpkey . '" class="zilla-form-textarea zilla-cinput">' . $cparam['std'] . '</textarea>' . "\n";
							$coutput .= $crow__nd;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'select' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="zilla-form-select zilla-cinput">' . "\n";
							
							foreach( $cparam['options'] as $value => $option )
							{
								$coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
							}
							
							$coutput .= '</select>' . "\n";
							$coutput .= $crow__nd;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'checkbox' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<label for="' . $cpkey . '" class="zilla-form-checkbox">' . "\n";
							$coutput .= '<input type="checkbox" class="zilla-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . ' />' . "\n";
							$coutput .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
							$coutput .= $crow__nd;
							
							// append
							$this->append_output( $coutput );
							
							break;
					}
				}
				
				// popup parent form row end
				$prow__nd    = '</ul>' . "\n";		// end .child-clone-row-form
				$prow__nd   .= '<a href="#" class="child-clone-row-remove">Remove</a>' . "\n";
				$prow__nd   .= '</div>' . "\n";		// end .child-clone-row
				
				
				$prow__nd   .= '</div>' . "\n";		// end .child-clone-rows
				$prow__nd   .= '</td>' . "\n";
				$prow__nd   .= '</tr>' . "\n";					
				$prow__nd   .= '</tbody>' . "\n";
				
				// add $prow__nd to output
				$this->append_output( $prow__nd );
			}			
		}
	}
	
	// --------------------------------------------------------------------------
	
	function append_output( $output )
	{
		$this->output = $this->output . "\n" . $output;		
	}
	
	// --------------------------------------------------------------------------
	
	function reset_output( $output )
	{
		$this->output = '';
	}
	
	// --------------------------------------------------------------------------
	
	function append__rror( $error )
	{
		$this->errors = $this->errors . "\n" . $error;
	}
}

?>