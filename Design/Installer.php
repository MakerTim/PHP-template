<?php $sec = ''; // Verander dit direct met https://www.base64encode.org/ ?> 
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 
			if((!isset($_POST) || empty($_POST['sec'])) || $_POST['sec'] != base64_decode($sec)) {
				echo '<form action="?security=true" method="POST"> <p>Security Token:</p> <input type="password" name="sec" /> <input type="submit" /> </form>';
				echo '</body></html>';
				exit;
			}
		?>
		<div class="row">
			<div id="error" class="col-md-6 col-md-offset-3 text-center text-error bg-danger" style="display: none;">
				There was an error:
			</div>
			<div id="success" class="col-md-6 col-md-offset-3 text-center text-error bg-success" style="display: none;">
			</div>
			<div class="col-md-6 col-md-offset-3 panel panel-default">
				<h1 class="text-center text-success panel-heading">PHP-Template setup</h1>
				<form class="panel-body" action="" method="POST">
					<?php
						echo '<input type="hidden" id="sec" name="sec" value="' . $_POST['sec'] . '"/>';
						echo '<input type="hidden" id="sec" name="sec2" value="' . base64_encode($_POST['sec']) . '"/>';
					?>
					<div class="form-group">
						<label class="text-primary" for="Domein">Domein Naam</label>
						<input type="text" class="form-control" id="Domein" name="Domein" placeholder="makertim.nl" required="true" />
						<label class="text-muted" for="Domein">* Domein zonder http / https</label>
					</div>
					<div class="Template Kleuren">
						<label class="text-primary" for="Kleuren">Kleuren Schema</label>
						<select class="form-control" id="Kleuren" name="Kleuren" placeholder="Template Kleuren Schema">
							<option>Amerika</option>
							<option>Gray</option>
							<option>mint</option>
							<option>Zomer</option>
						</select>
						<br />
					</div>
					<div class="form-group">
						<label class="text-primary" for="Google">Google+ Link</label>
						<input type="text" class="form-control" id="Google" name="Google" placeholder="Google+ linkje" />
						<label class="text-muted" for="Google">* https://plus.google.com/u/0/113110556789967759093/posts</label>
					</div>
					<div class="form-group">
						<label class="text-primary" for="Twitter">Twitter Account</label>
						<input type="text" class="form-control" id="Twitter" name="Twitter" placeholder="MakerTim" />
						<label class="text-muted" for="Twitter">* Alleen username</label>
					</div>
					<div class="form-group">
						<label class="text-primary" for="Facebook">Facebook link</label>
						<input type="text" class="form-control" id="Facebook" name="Facebook" placeholder="Facebook Pagina link" />
						<label class="text-muted" for="Facebook">* https://www.facebook.com/pages/Aanbiedingreizennl/424178287687819</label>
					</div>
					<div class="form-group">
						<label class="text-primary" for="Root">Root Directory</label>
						<input type="text" class="form-control" id="Root" name="Root" placeholder="/" />
						<label class="text-muted" for="Root">* / of /MAP NAAM/</label> <br />
						<label class="text-muted" for="Root">Locatie waar de site geupload moet worden.</label>
					</div>
					<div class="form-group">
						<label class="text-primary" for="Vergeten">Keyswords</label>
						<input type="text" class="form-control" id="Sleutel" name="Sleutel" placeholder="None" disabled="true" />
						<input type="text" class="form-control" id="Vergeten" name="Vergeten" placeholder="toAdd" />
						<button id="Add" class="form-control" onClick="return false;">Voeg toe</button>
						<button id="Reset" class="form-control" onClick="return false;">Reset Tags</button>
						<label class="text-muted" for="Vergeten">* Zoek woorden waarop de site gevonden moet worden</label>
						<script>
							$("#Reset").click(function() {
								$("#Sleutel").val("");
								$("#Vergeten").val("");
								$("#Vergeten").focus();
							});
							$("#Add").click(function() {
								add =  $("#Vergeten").val().replace(/\\/g, '\\\\').replace(/'/g, "\\'");
								$("#Sleutel").val($("#Sleutel").val() + "'" + add + "', ");
								$("#Vergeten").val("");
								$("#Vergeten").focus();
							});
						</script>
					</div>
					<br />
					<div class="form-group bg-warning">
						<h3 class="text-danger text-center">Submit</h3>
						<p class="text-muted text-center">Maak de website</p>
						<input type="submit" onClick="$('#Sleutel').removeAttr('disabled');" id="submit" class="form-control" value="Bouw website" />
					</div>
				</form>
			</div>
		</div>



<?php
	if(!isset($_POST) || empty($_POST['sec2']) || $_POST['sec2'] != $sec) {
		exit;
	}
	if(empty($_POST['Domein'])) {
		showError('Domein is nog niet ingevuld.');
		exit;
	}
	if(empty($_POST['Kleuren'])) {
		showError('Selecteer een Kleuren profiel.');
		exit;
	}
	if(empty($_POST['Root'])) {
		showError('Vul de map in waar je de Root van de site wilt installeren.');
		exit;
	}
	
	$domein 	= $_POST['Domein'];
	$root 		= $_POST['Root'];
	$rootF 		= '.' . preg_replace('/\/$/', '', $_POST['Root']);
	$google 	= "$_POST[Google]";
	$twitter 	= "$_POST[Twitter]";
	$facebook 	= "$_POST[Facebook]";
	$keys 	  	= str_replace("\'", "'", "$_POST[Sleutel]");
	
	downlaodTemplate($rootF);
	config($domein, $root, $rootF, $google, $twitter, $facebook, $keys, true, $_POST['Kleuren']);
	showSuccess('Webiste opgezet.');
	
	function showSuccess($errorMessage) {
		echo '<script> $("#success").show(); $("#success").html($("#success").html() + "<br /> <p>' . 
				$errorMessage . '</p>"); </script>';
	}
	
	function showError($errorMessage) {
		echo '<script> $("#error").show(); $("#error").html($("#error").html() + "<br /> <p>' . 
				$errorMessage . '</p>"); </script>';
	}
	
	function config($domein = '', $root = '/', $rootF = '.', 
			$google = '', $twitter = '', $facebook = '', $keys = '',
			$newConfig = true, $colorTemplate = 'Zomer') {
		$config = trim(file_get_contents($rootF .'/Classes/MktConfig.php'));
		if($newConfig){
			$replace = array(
				"/google.+;/",
				"/twitter.+;/",
				"/facebook.+;/",
				"/domein.+;/",
				"/rootDir.+;/",
				"/keys[\s!-~\n]*?;/",
			);
			$for = array(
				"google = '$google';",
				"twitter = '$twitter';",
				"facebook = '$facebook';",
				"domein = '$domein';",
				"rootDir = '$root';",
				"keys = array($keys);",
			);
		} else {
			$replace = '/google/';
			$for = 'google';
		}
		if(!is_null($colorTemplate)) {
			$config = preg_replace('/\/\/ Algemeen[\s!-~\n]*?}/', file_get_contents("Classes/Template/$colorTemplate.txt") . '}', $config);
		}
		file_put_contents($rootF .'/Classes/MktConfig.php', preg_replace($replace, $for, $config));
	}

	function downlaodTemplate($dir = '.') {
		file_put_contents('temp.zip', file_get_contents('https://github.com/MakerTim/PHP-template/archive/master.zip'));
		$unzip = new Unzip();
		$unzip->extract('temp.zip');
		recurse_copy('PHP-template-master', "$dir");
		createDirectoryIfNotExists("$dir/Content");
		createDirectoryIfNotExists("$dir/Content/Extra");
		createDirectoryIfNotExists("$dir/Content/MainMenu");
		createDirectoryIfNotExists("$dir/Content/Pages");
		createDirectoryIfNotExists("$dir/Content/Pictures");
		createDirectoryIfNotExists("$dir/Content/SideBar");
		copy('PHP-template-master/Content/Pages/404.xml', "$dir/Content/Pages/404.xml");
		recurse_copy('PHP-template-master/Content/Pictures', "$dir/Content/Pictures", false);
		unlink('temp.zip');
		deleteDirectory('PHP-template-master');
	}

	function recurse_copy($src, $dst, $overwrite = true) { 
		$dir = opendir($src); 
		@mkdir($dst); 
		while(false !== ($file = readdir($dir))) { 
			if(($file != '.') && ($file != '..') && ($file != 'Content')) { 
				if(is_dir("$src/$file")) { 
					recurse_copy("$src/$file", "$dst/$file"); 
				} else {
					if(!$overwrite){
						if(file_exists("$dst/$file")){
							continue;
						}
					}
					copy("$src/$file", "$dst/$file"); 
				}
			}
		} 
		closedir($dir); 
	} 

	function deleteDirectory($dir) {
		$result = false;
		if($handle = opendir($dir)) {
			$result = true;
			while((($file=readdir($handle))!==false) && ($result)) {
				if($file != '.' && $file != '..') {
					if(is_dir("$dir/$file")) {
						$result = deleteDirectory("$dir/$file");
					} else {
						$result = unlink("$dir/$file");
					}
				}
			}
			closedir($handle);
			if($result) {
				$result = rmdir($dir);
			}
		}
		return $result;
	}

	function createDirectoryIfNotExists($dir) {
		if(!file_exists($dir) || !is_dir($dir)) {
			mkdir($dir);
		}
	}

	// Stuff die op het internet staat, hier neem ik geen rechten over
	/**
	 * UnZip Class
	 *
	 * This class is based on a library I found at PHPClasses:
	 * http://phpclasses.org/package/2495-PHP-Pack-and-unpack-files-packed-in-ZIP-archives.html
	 *
	 * The original library is a little rough around the edges so I
	 * refactored it and added several additional methods -- Phil Sturgeon
	 *
	 * This class requires extension ZLib Enabled.
	 *
	 * @package		CodeIgniter
	 * @subpackage	Libraries
	 * @category	Encryption
	 * @author		Alexandre Tedeschi
	 * @author		Phil Sturgeon
	 * @author		Don Myers
	 * @link		http://bitbucket.org/philsturgeon/codeigniter-unzip
	 * @license     
	 * @version     1.0.0
	 */
	class Unzip {

		private $compressed_list = array();

		// List of files in the ZIP
		private $central_dir_list = array();

		// Central dir list... It's a kind of 'extra attributes' for a set of files
		private $end_of_central = array();

		// End of central dir, contains ZIP Comments
		private $info = array();
		private $error = array();
		private $_zip_file = '';
		private $_target_dir = FALSE;
		private $apply_chmod = FALSE;
		private $fh;
		private $zip_signature = "\x50\x4b\x03\x04";

		// local file header signature
		private $dir_signature = "\x50\x4b\x01\x02";

		// central dir header signature
		private $central_signature_end = "\x50\x4b\x05\x06";

		// ignore these directories (useless meta data)
		private $_skip_dirs = array('__MACOSX');

		private $_allow_extensions = NULL; // What is allowed out of the zip

		// --------------------------------------------------------------------

		/**
		 * Constructor
		 *
		 * @access    Public
		 * @param     string
		 * @return    none
		 */
		function __construct()
		{
		#	log_message('debug', 'Unzip Class Initialized');
		}

		// --------------------------------------------------------------------

		/**
		 * re inizilize all variables
		 * @access	Private
		 * @param		none
		 * @return	none
		 */
		private function _reinit()
		{
			$this->compressed_list = array();
			$this->central_dir_list = array();
			$this->end_of_central = array();
			$this->info = array();
			$this->error = array();
		}

		/**
		 * Unzip all files in archive.
		 *
		 * @access    Public
		 * @param     none
		 * @return    none
		 */
		public function extract($zip_file, $target_dir = NULL, $preserve_filepath = TRUE)
		{
			$this->_reinit();
			$this->_zip_file = $zip_file;
			$this->_target_dir = $target_dir ? $target_dir : dirname($this->_zip_file);

			if ( ! $files = $this->_list_files())
			{
				$this->set_error('ZIP folder was empty.');
				return FALSE;
			}

			$file_locations = array();
			foreach ($files as $file => $trash)
			{
				$dirname = pathinfo($file, PATHINFO_DIRNAME);
				$extension = pathinfo($file, PATHINFO_EXTENSION);

				$folders = explode('/', $dirname);
				$out_dn = $this->_target_dir . '/' . $dirname;

				// Skip stuff in stupid folders
				if (in_array(current($folders), $this->_skip_dirs))
				{
					continue;
				}

				// Skip any files that are not allowed
				if (is_array($this->_allow_extensions) AND $extension AND ! in_array($extension, $this->_allow_extensions))
				{
					continue;
				}

				if ( ! is_dir($out_dn) AND $preserve_filepath)
				{
					$str = "";
					foreach ($folders as $folder)
					{
						$str = $str ? $str . '/' . $folder : $folder;
						if ( ! is_dir($this->_target_dir . '/' . $str))
						{
							$this->set_debug('Creating folder: ' . $this->_target_dir . '/' . $str);

							if ( ! @mkdir($this->_target_dir . '/' . $str))
							{
								$this->set_error('Desitnation path is not writable.');
								return FALSE;
							}

							// Apply chmod if configured to do so
							$this->apply_chmod AND chmod($this->_target_dir . '/' . $str, $this->apply_chmod);
						}
					}
				}

				if (substr($file, -1, 1) == '/') continue;

				$file_locations[] = $file_location = $this->_target_dir . '/' . ($preserve_filepath ? $file : basename($file));

				$this->_extract_file($file, $file_location);
			}

			$this->compressed_list = array();

			return $file_locations;
		}

		// --------------------------------------------------------------------

		/**
		 * What extensions do we want out of this ZIP
		 *
		 * @access    Public
		 * @param     none
		 * @return    none
		 */
		public function allow($ext = NULL)
		{
			$this->_allow_extensions = $ext;
		}

		// --------------------------------------------------------------------

		/**
		 * Show error messages
		 *
		 * @access    public
		 * @param    string
		 * @return    string
		 */
		public function error_string($open = '<p>', $close = '</p>')
		{
			return $open . implode($close . $open, $this->error) . $close;
		}

		// --------------------------------------------------------------------

		/**
		 * Show debug messages
		 *
		 * @access    public
		 * @param    string
		 * @return    string
		 */
		public function debug_string($open = '<p>', $close = '</p>')
		{
			return $open . implode($close . $open, $this->info) . $close;
		}

		// --------------------------------------------------------------------

		/**
		 * Save errors
		 *
		 * @access    Private
		 * @param    string
		 * @return    none
		 */
		function set_error($string)
		{
			$this->error[] = $string;
		}

		// --------------------------------------------------------------------

		/**
		 * Save debug data
		 *
		 * @access    Private
		 * @param    string
		 * @return    none
		 */
		function set_debug($string)
		{
			$this->info[] = $string;
		}

		// --------------------------------------------------------------------

		/**
		 * List all files in archive.
		 *
		 * @access    Public
		 * @param     boolean
		 * @return    mixed
		 */
		private function _list_files($stop_on_file = FALSE)
		{
			if (sizeof($this->compressed_list))
			{
				$this->set_debug('Returning already loaded file list.');
				return $this->compressed_list;
			}

			// Open file, and set file handler
			$fh = fopen($this->_zip_file, 'r');
			$this->fh = &$fh;

			if ( ! $fh)
			{
				$this->set_error('Failed to load file: ' . $this->_zip_file);
				return FALSE;
			}

			$this->set_debug('Loading list from "End of Central Dir" index list...');

			if ( ! $this->_load_file_list_by_eof($fh, $stop_on_file))
			{
				$this->set_debug('Failed! Trying to load list looking for signatures...');

				if ( ! $this->_load_files_by_signatures($fh, $stop_on_file))
				{
					$this->set_debug('Failed! Could not find any valid header.');
					$this->set_error('ZIP File is corrupted or empty');

					return FALSE;
				}
			}

			return $this->compressed_list;
		}

		// --------------------------------------------------------------------

		/**
		 * Unzip file in archive.
		 *
		 * @access    Public
		 * @param     string, boolean
		 * @return    Unziped file.
		 */
		private function _extract_file($compressed_file_name, $target_file_name = FALSE)
		{
			if ( ! sizeof($this->compressed_list))
			{
				$this->set_debug('Trying to unzip before loading file list... Loading it!');
				$this->_list_files(FALSE, $compressed_file_name);
			}

			$fdetails = &$this->compressed_list[$compressed_file_name];

			if ( ! isset($this->compressed_list[$compressed_file_name]))
			{
				$this->set_error('File "<strong>$compressed_file_name</strong>" is not compressed in the zip.');
				return FALSE;
			}

			if (substr($compressed_file_name, -1) == '/')
			{
				$this->set_error('Trying to unzip a folder name "<strong>$compressed_file_name</strong>".');
				return FALSE;
			}

			if ( ! $fdetails['uncompressed_size'])
			{
				$this->set_debug('File "<strong>$compressed_file_name</strong>" is empty.');

				return $target_file_name ? file_put_contents($target_file_name, '') : '';
			}

			fseek($this->fh, $fdetails['contents_start_offset']);
			$ret = $this->_uncompress(
				fread($this->fh, $fdetails['compressed_size']),
				$fdetails['compression_method'],
				$fdetails['uncompressed_size'],
				$target_file_name
			);

			if ($this->apply_chmod AND $target_file_name)
			{
				chmod($target_file_name, FILE_READ_MODE);
			}

			return $ret;
		}

		// --------------------------------------------------------------------

		/**
		 * Free the file resource.
		 *
		 * @access    Public
		 * @param     none
		 * @return    none
		 */
		public function close()
		{
			// Free the file resource
			if ($this->fh)
			{
				fclose($this->fh);
			}
		}

		// --------------------------------------------------------------------

		/**
		 * Free the file resource Automatic destroy.
		 *
		 * @access    Public
		 * @param     none
		 * @return    none
		 */
		public function __destroy()
		{
			$this->close();
		}

		// --------------------------------------------------------------------

		/**
		 * Uncompress file. And save it to the targetFile.
		 *
		 * @access    Private
		 * @param     Filecontent, int, int, boolean
		 * @return    none
		 */
		private function _uncompress($content, $mode, $uncompressed_size, $target_file_name = FALSE)
		{
			switch ($mode)
			{
				case 0:
					return $target_file_name ? file_put_contents($target_file_name, $content) : $content;
				case 1:
					$this->set_error('Shrunk mode is not supported... yet?');
					return FALSE;
				case 2:
				case 3:
				case 4:
				case 5:
					$this->set_error('Compression factor ' . ($mode - 1) . ' is not supported... yet?');
					return FALSE;
				case 6:
					$this->set_error('Implode is not supported... yet?');
					return FALSE;
				case 7:
					$this->set_error('Tokenizing compression algorithm is not supported... yet?');
					return FALSE;
				case 8:
					// Deflate
					return $target_file_name ?
							file_put_contents($target_file_name, gzinflate($content, $uncompressed_size)) :
							gzinflate($content, $uncompressed_size);
				case 9:
					$this->set_error('Enhanced Deflating is not supported... yet?');
					return FALSE;
				case 10:
					$this->set_error('PKWARE Date Compression Library Impoloding is not supported... yet?');
					return FALSE;
				case 12:
					// Bzip2
					return $target_file_name ?
							file_put_contents($target_file_name, bzdecompress($content)) :
							bzdecompress($content);
				case 18:
					$this->set_error('IBM TERSE is not supported... yet?');
					return FALSE;
				default:
					$this->set_error('Unknown uncompress method: $mode');
					return FALSE;
			}
		}

		private function _load_file_list_by_eof(&$fh, $stop_on_file = FALSE)
		{
			// Check if there's a valid Central Dir signature.
			// Let's consider a file comment smaller than 1024 characters...
			// Actually, it length can be 65536.. But we're not going to support it.

			for ($x = 0; $x < 1024; $x++)
			{
				fseek($fh, -22 - $x, SEEK_END);

				$signature = fread($fh, 4);

				if ($signature == $this->central_signature_end)
				{
					// If found EOF Central Dir
					$eodir['disk_number_this'] = unpack("v", fread($fh, 2)); // number of this disk
					$eodir['disk_number'] = unpack("v", fread($fh, 2)); // number of the disk with the start of the central directory
					$eodir['total_entries_this'] = unpack("v", fread($fh, 2)); // total number of entries in the central dir on this disk
					$eodir['total_entries'] = unpack("v", fread($fh, 2)); // total number of entries in
					$eodir['size_of_cd'] = unpack("V", fread($fh, 4)); // size of the central directory
					$eodir['offset_start_cd'] = unpack("V", fread($fh, 4)); // offset of start of central directory with respect to the starting disk number
					$zip_comment_lenght = unpack("v", fread($fh, 2)); // zipfile comment length
					$eodir['zipfile_comment'] = $zip_comment_lenght[1] ? fread($fh, $zip_comment_lenght[1]) : ''; // zipfile comment

					$this->end_of_central = array(
						'disk_number_this' => $eodir['disk_number_this'][1],
						'disk_number' => $eodir['disk_number'][1],
						'total_entries_this' => $eodir['total_entries_this'][1],
						'total_entries' => $eodir['total_entries'][1],
						'size_of_cd' => $eodir['size_of_cd'][1],
						'offset_start_cd' => $eodir['offset_start_cd'][1],
						'zipfile_comment' => $eodir['zipfile_comment'],
					);

					// Then, load file list
					fseek($fh, $this->end_of_central['offset_start_cd']);
					$signature = fread($fh, 4);

					while ($signature == $this->dir_signature)
					{
						$dir['version_madeby'] = unpack("v", fread($fh, 2)); // version made by
						$dir['version_needed'] = unpack("v", fread($fh, 2)); // version needed to extract
						$dir['general_bit_flag'] = unpack("v", fread($fh, 2)); // general purpose bit flag
						$dir['compression_method'] = unpack("v", fread($fh, 2)); // compression method
						$dir['lastmod_time'] = unpack("v", fread($fh, 2)); // last mod file time
						$dir['lastmod_date'] = unpack("v", fread($fh, 2)); // last mod file date
						$dir['crc-32'] = fread($fh, 4);			  // crc-32
						$dir['compressed_size'] = unpack("V", fread($fh, 4)); // compressed size
						$dir['uncompressed_size'] = unpack("V", fread($fh, 4)); // uncompressed size
						$zip_file_length = unpack("v", fread($fh, 2)); // filename length
						$extra_field_length = unpack("v", fread($fh, 2)); // extra field length
						$fileCommentLength = unpack("v", fread($fh, 2)); // file comment length
						$dir['disk_number_start'] = unpack("v", fread($fh, 2)); // disk number start
						$dir['internal_attributes'] = unpack("v", fread($fh, 2)); // internal file attributes-byte1
						$dir['external_attributes1'] = unpack("v", fread($fh, 2)); // external file attributes-byte2
						$dir['external_attributes2'] = unpack("v", fread($fh, 2)); // external file attributes
						$dir['relative_offset'] = unpack("V", fread($fh, 4)); // relative offset of local header
						$dir['file_name'] = fread($fh, $zip_file_length[1]);							 // filename
						$dir['extra_field'] = $extra_field_length[1] ? fread($fh, $extra_field_length[1]) : ''; // extra field
						$dir['file_comment'] = $fileCommentLength[1] ? fread($fh, $fileCommentLength[1]) : ''; // file comment

						// Convert the date and time, from MS-DOS format to UNIX Timestamp
						$binary_mod_date = str_pad(decbin($dir['lastmod_date'][1]), 16, '0', STR_PAD_LEFT);
						$binary_mod_time = str_pad(decbin($dir['lastmod_time'][1]), 16, '0', STR_PAD_LEFT);
						$last_mod_year = bindec(substr($binary_mod_date, 0, 7)) + 1980;
						$last_mod_month = bindec(substr($binary_mod_date, 7, 4));
						$last_mod_day = bindec(substr($binary_mod_date, 11, 5));
						$last_mod_hour = bindec(substr($binary_mod_time, 0, 5));
						$last_mod_minute = bindec(substr($binary_mod_time, 5, 6));
						$last_mod_second = bindec(substr($binary_mod_time, 11, 5));

						$this->central_dir_list[$dir['file_name']] = array(
							'version_madeby' => $dir['version_madeby'][1],
							'version_needed' => $dir['version_needed'][1],
							'general_bit_flag' => str_pad(decbin($dir['general_bit_flag'][1]), 8, '0', STR_PAD_LEFT),
							'compression_method' => $dir['compression_method'][1],
							'lastmod_datetime' => mktime($last_mod_hour, $last_mod_minute, $last_mod_second, $last_mod_month, $last_mod_day, $last_mod_year),
							'crc-32' => str_pad(dechex(ord($dir['crc-32'][3])), 2, '0', STR_PAD_LEFT) .
							str_pad(dechex(ord($dir['crc-32'][2])), 2, '0', STR_PAD_LEFT) .
							str_pad(dechex(ord($dir['crc-32'][1])), 2, '0', STR_PAD_LEFT) .
							str_pad(dechex(ord($dir['crc-32'][0])), 2, '0', STR_PAD_LEFT),
							'compressed_size' => $dir['compressed_size'][1],
							'uncompressed_size' => $dir['uncompressed_size'][1],
							'disk_number_start' => $dir['disk_number_start'][1],
							'internal_attributes' => $dir['internal_attributes'][1],
							'external_attributes1' => $dir['external_attributes1'][1],
							'external_attributes2' => $dir['external_attributes2'][1],
							'relative_offset' => $dir['relative_offset'][1],
							'file_name' => $dir['file_name'],
							'extra_field' => $dir['extra_field'],
							'file_comment' => $dir['file_comment'],
						);

						$signature = fread($fh, 4);
					}

					// If loaded centralDirs, then try to identify the offsetPosition of the compressed data.
					if ($this->central_dir_list)
					{
						foreach ($this->central_dir_list as $filename => $details)
						{
							$i = $this->_get_file_header($fh, $details['relative_offset']);
							
							$this->compressed_list[$filename]['file_name'] = $filename;
							$this->compressed_list[$filename]['compression_method'] = $details['compression_method'];
							$this->compressed_list[$filename]['version_needed'] = $details['version_needed'];
							$this->compressed_list[$filename]['lastmod_datetime'] = $details['lastmod_datetime'];
							$this->compressed_list[$filename]['crc-32'] = $details['crc-32'];
							$this->compressed_list[$filename]['compressed_size'] = $details['compressed_size'];
							$this->compressed_list[$filename]['uncompressed_size'] = $details['uncompressed_size'];
							$this->compressed_list[$filename]['lastmod_datetime'] = $details['lastmod_datetime'];
							$this->compressed_list[$filename]['extra_field'] = $i['extra_field'];
							$this->compressed_list[$filename]['contents_start_offset'] = $i['contents_start_offset'];

							if (strtolower($stop_on_file) == strtolower($filename))
							{
								break;
							}
						}
					}

					return TRUE;
				}
			}
			return FALSE;
		}

		private function _load_files_by_signatures(&$fh, $stop_on_file = FALSE)
		{
			fseek($fh, 0);

			$return = FALSE;
			for (;;)
			{
				$details = $this->_get_file_header($fh);

				if ( ! $details)
				{
					$this->set_debug('Invalid signature. Trying to verify if is old style Data Descriptor...');
					fseek($fh, 12 - 4, SEEK_CUR); // 12: Data descriptor - 4: Signature (that will be read again)
					$details = $this->_get_file_header($fh);
				}

				if ( ! $details)
				{
					$this->set_debug('Still invalid signature. Probably reached the end of the file.');
					break;
				}

				$filename = $details['file_name'];
				$this->compressed_list[$filename] = $details;
				$return = true;

				if (strtolower($stop_on_file) == strtolower($filename))
				{
					break;
				}
			}

			return $return;
		}

		private function _get_file_header(&$fh, $start_offset = FALSE)
		{
			if ($start_offset !== FALSE)
			{
				fseek($fh, $start_offset);
			}

			$signature = fread($fh, 4);

			if ($signature == $this->zip_signature)
			{
				// Get information about the zipped file
				$file['version_needed'] = unpack("v", fread($fh, 2)); // version needed to extract
				$file['general_bit_flag'] = unpack("v", fread($fh, 2)); // general purpose bit flag
				$file['compression_method'] = unpack("v", fread($fh, 2)); // compression method
				$file['lastmod_time'] = unpack("v", fread($fh, 2)); // last mod file time
				$file['lastmod_date'] = unpack("v", fread($fh, 2)); // last mod file date
				$file['crc-32'] = fread($fh, 4);			  // crc-32
				$file['compressed_size'] = unpack("V", fread($fh, 4)); // compressed size
				$file['uncompressed_size'] = unpack("V", fread($fh, 4)); // uncompressed size
				$zip_file_length = unpack("v", fread($fh, 2)); // filename length
				$extra_field_length = unpack("v", fread($fh, 2)); // extra field length
				$file['file_name'] = fread($fh, $zip_file_length[1]); // filename
				$file['extra_field'] = $extra_field_length[1] ? fread($fh, $extra_field_length[1]) : ''; // extra field
				$file['contents_start_offset'] = ftell($fh);

				// Bypass the whole compressed contents, and look for the next file
				fseek($fh, $file['compressed_size'][1], SEEK_CUR);

				// Convert the date and time, from MS-DOS format to UNIX Timestamp
				$binary_mod_date = str_pad(decbin($file['lastmod_date'][1]), 16, '0', STR_PAD_LEFT);
				$binary_mod_time = str_pad(decbin($file['lastmod_time'][1]), 16, '0', STR_PAD_LEFT);

				$last_mod_year = bindec(substr($binary_mod_date, 0, 7)) + 1980;
				$last_mod_month = bindec(substr($binary_mod_date, 7, 4));
				$last_mod_day = bindec(substr($binary_mod_date, 11, 5));
				$last_mod_hour = bindec(substr($binary_mod_time, 0, 5));
				$last_mod_minute = bindec(substr($binary_mod_time, 5, 6));
				$last_mod_second = bindec(substr($binary_mod_time, 11, 5));

				// Mount file table
				$i = array(
					'file_name' => $file['file_name'],
					'compression_method' => $file['compression_method'][1],
					'version_needed' => $file['version_needed'][1],
					'lastmod_datetime' => mktime($last_mod_hour, $last_mod_minute, $last_mod_second, $last_mod_month, $last_mod_day, $last_mod_year),
					'crc-32' => str_pad(dechex(ord($file['crc-32'][3])), 2, '0', STR_PAD_LEFT) .
					str_pad(dechex(ord($file['crc-32'][2])), 2, '0', STR_PAD_LEFT) .
					str_pad(dechex(ord($file['crc-32'][1])), 2, '0', STR_PAD_LEFT) .
					str_pad(dechex(ord($file['crc-32'][0])), 2, '0', STR_PAD_LEFT),
					'compressed_size' => $file['compressed_size'][1],
					'uncompressed_size' => $file['uncompressed_size'][1],
					'extra_field' => $file['extra_field'],
					'general_bit_flag' => str_pad(decbin($file['general_bit_flag'][1]), 8, '0', STR_PAD_LEFT),
					'contents_start_offset' => $file['contents_start_offset']
				);

				return $i;
			}

			return FALSE;
		}
	}
?>
	</body>
</html>