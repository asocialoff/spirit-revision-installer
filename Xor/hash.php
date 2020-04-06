<?php 
class Hash
{
        public function hash_string( String $str , $row_output = TRUE, $method = "sha256" )
        {
            return hash($method, $str, $row_output);
        }
        public function hash_public_string( $str , $key , $row_output = TRUE, $method = "sha256" )
        {
            return hash_hmac( $method , $str , $key , $row_output );
        }
}
?>
