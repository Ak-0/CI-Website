<?php
class Post_Test extends CI_Controller
{

            public function post_to_db(){

                $thumbs = $this->input->post('thumbs');
                

                if(isset($thumbs)){
                file_put_contents( '/imgs/file_from_post.jpg', $thumbs);
                print_r("<img src = '/imgs/file_from_post.jpg'></img>");
                    echo"yes";
                }

                else{
                    echo"not";
                }




       // echo $test_thumb;
           //file_put_contents('imgs/filetest.jpg',  fopen($test_image,'c'));
            //file_put_contents('imgs/notest.jpg', fopen( $test_thumb,'c'));

        /*
        for ($index = 0; $index < 8; $index++){

           foreach(){
               echo $input;

           }
            foreach(){
                echo $input2;
            }*/
        }
    }









