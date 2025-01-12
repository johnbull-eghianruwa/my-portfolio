<?php
/**
 * Simply Schedule Appointments Twig Extension.
 *
 * @since   3.2.3
 * @package Simply_Schedule_Appointments
 */

/**
 * Simply Schedule Appointments Twig Extension.
 *
 * @since 3.2.3
 */
class SSA_Twig_Extension extends Twig\Extension\AbstractExtension {
	public function getFilters() {
		return [
			new Twig\TwigFilter('date', array( $this, 'date_format_filter' ), array('needs_environment' => true) ),
			new Twig\TwigFilter('internationalize', array( $this, 'internationalize_filter' ), array('needs_environment' => true) ),
			new Twig\TwigFilter('link', array( $this, 'link' ), array('needs_environment' => true) ),
		];
	}

	public function date_format_filter( Twig\Environment $env, $date, $format = null, $timezone = null, $locale = null ) {

		if ( empty( $format ) ) {
			// Let's use a smart default
			$format = SSA_Utils::localize_default_date_strings( 'F j, Y g:i a' ) . ' (T)';
		} else if ( $format === 'F d, Y g:ia (T)' || $format === 'F d Y, g:i a' ) {
			// and localize the default string we use in our SSA template
			$format = SSA_Utils::localize_default_date_strings( 'F j, Y g:i a' ) . ' (T)';
		}
		
		if(! empty( $locale ) ) {
			// should it be handled here in the date filter? or in a different filter?
			ssa()->translation->set_programmatic_locale( $locale );
		}

		$formatted_date = twig_date_converter( $env, $date, $timezone )->format($format);
		$formatted_date = SSA_Utils::translate_formatted_date( $formatted_date );

		if(! empty( $locale ) ) {
			ssa()->translation->set_programmatic_locale(null);
		}
		
		return $formatted_date;

		// TODO: refactor below into a separate twig function that uses strftime formatting

		// $timezone_string = false;
		// if ( is_string( $timezone ) ) {
		// 	$timezone_string = $timezone;
		// } else if ( is_a( $timezone, 'DateTimeZone' ) ) {
		// 	$timezone_string = $timezone->getName();
		// }
		// $wp_locale = get_locale();
		// if ( ! empty( $format ) && $wp_locale != 'en_US' ) {
		// 	$formatted_date = twig_date_format_filter( $env, $date, $format, $timezone );

		// 	if ( ! empty( $timezone_string ) ) {
		// 		$server_locale = setlocale( LC_ALL, 0 );
		// 		$new_locale = setlocale( LC_ALL, $wp_locale );
		// 		date_default_timezone_set( $timezone_string );

		// 		$strftime_format = $this->get_strftime_format_for_date_format( $format );
		// 		$formatted_date = strftime( $strftime_format, strtotime( $date ) );
		// 		date_default_timezone_set( 'UTC' );
		// 		setlocale( LC_ALL, $server_locale );
		// 	} else {
		// 		$formatted_date = date_i18n( $format, strtotime( $date ) );
		// 	}

		// }

	}

	public function internationalize_filter( Twig\Environment $env, $string, $locale = null) {
		if(! empty( $locale ) ) {
			ssa()->translation->set_programmatic_locale( $locale );
		}
		
		$translated_string = __( $string, 'simply-schedule-appointments' );
		
		if(! empty( $locale ) ) {
			ssa()->translation->set_programmatic_locale( null );
		}
		
		return $translated_string;
	}

	public function link( Twig\Environment $env, $string, $label ) {
		return '<a href="'.$string.'">'.$label.'</a>';
	}

	/**
	* Convert a date format to a strftime format
	*
	* Timezone conversion is done for unix. Windows users must exchange %z and %Z.
	*
	* Unsupported date formats : S, n, t, L, B, G, u, e, I, P, Z, c, r
	* Unsupported strftime formats : %U, %W, %C, %g, %r, %R, %T, %X, %c, %D, %F, %x
	*
	* @param string $date_format a date format
	* @return string
	*/
	public static function get_strftime_format_for_date_format( $date_format ) {
	   
		$caracs = array(
			// Day - no strf eq : S
			'd' => '%d', 'D' => '%a', 'j' => '%e', 'l' => '%A', 'N' => '%u', 'w' => '%w', 'z' => '%j',

			// Week - no date eq : %U, %W
			'W' => '%V', 

			// Month - no strf eq : n, t
			'F' => '%B', 'm' => '%m', 'M' => '%b',

			// Year - no strf eq : L; no date eq : %C, %g
			'o' => '%G', 'Y' => '%Y', 'y' => '%y',

			// Time - no strf eq : B, G, u; no date eq : %r, %R, %T, %X
			'a' => '%P', 'A' => '%p', 'g' => '%l', 'h' => '%I', 'H' => '%H', 'i' => '%M', 's' => '%S',
			// Time Pseudo Translation
			'G' => '%H', // German uses G, %H is close

			// Timezone - no strf eq : e, I, P, Z
			'O' => '%z', 'T' => '%Z',

			// Full Date / Time - no strf eq : c, r; no date eq : %c, %D, %F, %x 
			'U' => '%s'

		);
	   
		return strtr( ( string ) $date_format, $caracs );
	} 
}
