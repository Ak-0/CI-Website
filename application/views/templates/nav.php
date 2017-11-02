<?
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>
  <div class="container">
    <div class="row">
	<div class="navigation">
		<ul style=" margin: 0px;display: flex;padding: 0px;">
  <a href='/news'> <li class="<?php if($this->uri->segment(1)=="news"){echo "active";}?>">News</li></a>
  <a href='/works'> <li class="<?php if($this->uri->segment(1)=="works"){echo "active";}?>">Info</li></a>
  <a href='/posts'> <li class="<?php if($this->uri->segment(1)=="posts"){echo "active";}?>" style="">Updates</li></a>
  <a href='/contact'> <li class="<?php if($this->uri->segment(1)=="contact"){echo "active";}?>">Contact</li>  </a>
  
  </ul></div>
 <div class="column" >
