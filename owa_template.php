<?

//
// Open Web Analytics - An Open Source Web Analytics Framework
//
// Copyright 2006 Peter Adams. All rights reserved.
//
// Licensed under GPL v2.0 http://www.gnu.org/copyleft/gpl.html
//
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.
//
// $Id$
//

require_once(OWA_INCLUDE_DIR.'/template_class.php');

/**
 * OWA Wrapper for template class
 * 
 * @author      Peter Adams <peter@openwebanalytics.com>
 * @copyright   Copyright &copy; 2006 Peter Adams <peter@openwebanalytics.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GPL v2.0
 * @category    owa
 * @package     owa
 * @version		$Revision$	      
 * @since		owa 1.0.0
 */

class owa_template extends Template {
	
	/**
	 * Configuration
	 *
	 * @var array
	 */
	var $config;
	
	function owa_template() {
		$this->config = &owa_settings::get_settings();
		$this->Template();
	}
	
	/**
	 * Truncate string
	 *
	 * @param string $str
	 * @param integer $length
	 * @param string $trailing
	 * @return string
	 */
	function truncate ($str, $length=10, $trailing='...')  {
	 
    	// take off chars for the trailing 
    	$length-=strlen($trailing); 
    	if (strlen($str) > $length):
        	// string exceeded length, truncate and add trailing dots 
         	return substr($str,0,$length).$trailing; 
		else:  
        	// string was already short enough, return the string 
        	$res = $str;  
      	endif;
   
      return $res; 
	}
	
	function get_month_label($month) {
		
		return owa_lib::get_month_label($month);
	}
	
	/**
	 * Chooses the right icon based on browser type
	 *
	 * @param unknown_type $browser_type
	 * @return unknown
	 */
	function choose_browser_icon($browser_type) {
		
		switch (strtolower($browser_type)) {
			
			case "ie":
				$file = 'msie.png';
				break;
			case "firefox":
				$file = 'firefox.png';
				break;
			case "safari":
				$file = 'safari.png';
				break;
			case "opera":
				$file = 'opera.png';
				break;
			case "netscape":
				$file = 'netscape.png';
				break;
			
			
		}
		if (!empty($file)):
			return $icon = "<img src=\"".$this->config['images_url']."/".$file."\">";
		else:
			return $browser_type;
		endif;
		
		return;
	}
}

?>