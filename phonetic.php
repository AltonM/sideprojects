<?php

function phonetic($word){
	echo 'You have entered: '.$word.'<br /><br />';
    $phonetic = array(
        'double_e'=>'i',
        'uppercase_i'=>'&#618;',
        'inverted_omega'=>'&#8487;',
        'u'=>'u',
        'i_inverted_e'=>'&#618;&#601;', //I Inverted e
        'ei'=>'e&#618;',
        'epsilon'=>'&#604;',//epsilon
        'inverted_epsilon'=>'&#603;',//backwards epsilon
        '&#603;',//backwards epsilon
        'schwa'=>'&#601;',
        'inverted_c'=>'&#596;',
        'omega_schwa'=>'&#8487;&#601;',
        'inverted_c_with_i'=>'&#596;&#618;',
        'o_with_omega'=>'O&#8487;',
        'ash'=>'&aelig;',
        'wedge'=>'&#652;',
        'inverted_wedge'=>'&#8744;',
        'e_inverted_e'=>'e&#601;',
        'ai'=>'aI',
        'a_omega'=>'a&#8487;',
        'ch'=>'&#679;',
        'ch'=>'&#679;',
        'c'=>'k',
        'th'=>'&#952;',
        'th_folwed_by_is'=>'&#240;',
        'sh'=>'&#643;',
        'ezh'=>'&#658;',
        'ing'=>'&#331;',
        'a'=>'&#593;',
        'ctlPeriod'=>'&#720;',
        'inverted_schwa'=>'&#601',
        'isi'=>'&#658;',
        'j'=>'&#676;'
    );
   
   
   

    //single letters

/*   
   
       
    //b
    //c
        if(stripos($word,'c')>-1){
            if(strtolower($word[stripos($word,'c')+1]) == 'h'){
                $word = str_replace('ch',$phonetic['ch'],$word);
            }else if(strtolower($word[stripos($word,'c')+1]) == 'o'){
                $word = str_replace('co',$phonetic['c'].$phonetic['inverted_schwa'],$word);
            }else{
                $word = str_replace('c',$phonetic['c'],$word);
            }
        }
   
    //d
    //e
        if(stripos($word,'e')>-1){
           
            if(preg_match("/ee/i",$word) || preg_match("/ea/i",$word)){
               
                $word = str_replace('ea','i&#720;',$word);
                $word = str_replace('ee','i&#720;',$word);
               
            }else if(strtolower($word[stripos($word,'e')+1]) == 'l'){
                if(strtolower($word[stripos($word,'el')+2]) == 'e'){
                    $word = str_replace('ele',$phonetic['inverted_epsilon'].'l'.$phonetic['uppercase_i'],$word);
                }
            }else if(strtolower($word[stripos($word,'e')+1]) == 's'){
           
                $word = str_replace('e',$phonetic['epsilon'],$word);
           
            }else{
                $word = str_replace('ee',$phonetic['double_e'],$word);
            }
           
            if(preg_match("/de/i",$word) && strtolower($word[stripos($word,'e')+1]) != 'r'){
               
                    $word = str_replace('de','d'.$phonetic['uppercase_i'].'\'',$word);
               
            }
           
            if(preg_match("/er/i",$word)){
                $word = str_replace('er',$phonetic['inverted_schwa'],$word);
            }
        }
    //f
    //g
    //h
    //i
    //j
    //k
    //l
    //m
    //n
    //o
        if(stripos($word,'o')>-1){
            if(strtolower($word[stripos($word,'o')+1]) == 'u'){
                if(strtolower($word[stripos($word,'ou')+2]) == 'r'){
               
                    $word = str_replace('ou',$phonetic['inverted_omega'].$phonetic['schwa'],$word);
                   
                }else{
               
                    $word = str_replace('ou','a'.$phonetic['inverted_omega'],$word);
                   
                }
            }else if(strtolower($word[stripos($word,'o')+1]) == 'w'){
           
                $word = str_replace('ow',$phonetic['schwa'].$phonetic['inverted_omega'],$word);
               
            }else if(strtolower($word[stripos($word,'o')+1]) == 'i'){
           
                $word = str_replace('oi',$phonetic['inverted_c'].'&#618;',$word);
            }
           
            if(preg_match("/oo/i",$word)){
                if(strtolower($word[stripos($word,'oo')+2]) == 'm'){
                    $word = str_replace('oo','u'.$phonetic['ctlPeriod'],$word);
                }else if($word[stripos($word,'oo')+2] == 'r'){
                    $word = str_replace('oor',$phonetic['inverted_c'].$phonetic['ctlPeriod'],$word);
                }
            }
        }
    //p
        if(stripos($word,'p')>-1){
            if(strtolower($word[stripos($word,'ph')+2]) == 'a'){
                $word = str_replace('pha','f'.$phonetic['inverted_schwa'],$word);
            }else{
                $word = str_replace('ph','f',$word);
            }
           
            if(preg_match("/pp/i",$word)){
                $word = str_replace('pp','p',$word);
            }
        }
           
    //q
    if(stripos($word,'s')>-1){
        if(strtolower($word[stripos($word,'s')+1]) == 'h'){
            $word = str_replace('sh',$phonetic['sh'],$word);
        }else if(strtolower($word[stripos($word,'s')+1] == 'e') && (strtolower($word[stripos($word,'s')-1]) == 'e' || strtolower($word[stripos($word,'s')-1]) == 'a')){
            $word = str_replace('se','z',$word);
        }else if(strtolower($word[stripos($word,'s')+1]) == 'i' && strtolower($word[stripos($word,'s')-1]) == 'i'){
            if(strtolower($word[stripos($word,'s')+1]) == 'i' && strtolower($word[stripos($word,'s')+2]) == 'o' && strtolower($word[stripos($word,'s')+3]) == 'n' && strtolower($word[stripos($word,'s')-1]) == 'i'){
                $word = str_replace('sio',$phonetic['isi'].$phonetic['inverted_schwa'],$word);
            }else{
                $word = str_replace('s',$phonetic['isi'],$word);
            }
        }else if(strtolower($word[stripos($word,'s')+1]) == 'i' && strtolower($word[stripos($word,'s')-1]) == 'u'){
            if(strtolower($word[stripos($word,'s')-2]) == 'f'){
                $word = str_replace('fu','fju'.$phonetic['ctlPeriod'],$word);
                $word = str_replace('sio',$phonetic['isi'].$phonetic['inverted_schwa'],$word);
            }else{
                $word = str_replace('sio',$phonetic['isi'].$phonetic['inverted_schwa'],$word);
            }
        }
    }
    //r
    //s
    //t
        if(stripos($word,'th')>-1){
            if(strtolower($word[stripos($word,'th')+2]) == 'e'){
                $word = str_replace('the',$phonetic['th_folwed_by_is'].$phonetic['inverted_e'],$word);
               
            }else if(strtolower($word[stripos($word,'th')+2]) == 'i' && strtolower($word[stripos($word,'th')+3]) == 's'){
               
                $word = str_replace('th',$phonetic['th_folwed_by_is'],$word);
            }else{
                $word = str_replace('th',$phonetic['th'],$word);
            }
        }
   
    //u
        if(stripos($word,'u')>-1){
            if(stripos($word,'u')== 0){
                $word = $phonetic['wedge'].substr($word,1,strlen($word));
            }else if(preg_match('/up/i',$word) || preg_match('/utt/i',$word)){
                $word = str_replace('u',$phonetic['wedge'],$word);   
            }else if(preg_match('/ut/i',$word)){
                $word = str_replace('u',$phonetic['inverted_omega'],$word);   
            }
        }
    //v
        if(stripos($word,'v')>-1){
            if(strtolower($word[stripos($word,'v')+1]) == 'i'){
                $word = str_replace('vi',$phonetic['inverted_wedge'].$phonetic['uppercase_i'],$word);   
            }else{
                $word = str_replace('v',$phonetic['inverted_wedge'],$word);   
            }
        }
    //w
    //x
    //y
    //z */
$word = strtolower($word);
$word = str_split($word,1);
    for($i=0;$i<count($word);$i++){
        //a
        if($word[$i] == 'a'){
       
            if(isset($word[$i+1]) && $word[$i+1] == 'i'){
				if(isset($word[$i+2]) && $word[$i+2] == 'r'){
					$word[$i] = $phonetic['inverted_epsilon'];
					$word[$i+1] = $phonetic['schwa'];
					$word[$i+2] = '';
					$i+=2;
				}else{
					$word[$i] = 'e';
					$word[$i+1] = $phonetic['uppercase_i'];
					$i+=1;
				}
            }else if(isset($word[$i+1]) && $word[$i+1] == 'u'){
				$word[$i] = $phonetic['inverted_c'];
				$word[$i+1] = $phonetic['ctlPeriod'];
				$i+=1;
			}else if(isset($word[$i+1]) && $word[$i+1] == 'l'){
				if(isset($word[$i+2]) && $word[$i+2] == 'e'){
					$word[$i] = 'e';
					$word[$i+1] = $phonetic['uppercase_i'];
					$word[$i+2] = 'l';
					$i+=2;
				}else{
					$word[$i] = $phonetic['ash'];
				}
			}else{
				$word[$i] = $phonetic['ash'];
			}
           
            /*if(strtolower($word[stripos($word,'a')+1]) == 'r' && stripos($word,'a') == 0 ){
                $word = str_replace('ar',$phonetic['a'].$phonetic['ctlPeriod'],$word);
            }else{
               
                if(strlen($word)<2){
                   
                }else if(strlen($word)>1){
                    if(preg_match("/au/i",$word)){
                        $word = str_replace('au',$phonetic['inverted_c'].$phonetic['ctlPeriod'],$word);
                    }else if(strtolower($word[stripos($word,'a')-1]) != 'h'){
                        $word = str_replace('a',$phonetic['ash'],$word);
                    }
               
                }else{
                    $word = str_replace('are',$phonetic['inverted_epsilon'].$phonetic['schwa'],$word);
                }
            }
			
			 if(stripos($word,'ai')>-1 || stripos($word,'ale')>-1){
            if(strtolower($word[stripos($word,'ai')+1]) == 'l'){
                $word = str_replace('ail',$phonetic['ei'].'l',$word);
                $word = str_replace('ale',$phonetic['ei'].'l',$word);
            }else if(strtolower($word[stripos($word,'ai')+2]) == 'r'){
                $word = str_replace('air',$phonetic['inverted_epsilon'].$phonetic['schwa'],$word);
            }else{
                $word = str_replace('ai',$phonetic['ei'],$word);
            }
        }
			
			*/
        }
		
		//b
		//c
		if($word[$i] == 'c'){
			 if(isset($word[$i+1]) && $word[$i+1] == 'h'){
				$word[$i] = $phonetic['ch'];
				$word[$i+1] = '';
				$i+=1;
			 }else{
				$word[$i] = $phonetic['c'];
			 }
		}
		//d
		if($word[$i] == 'd'){
			/* if($word[$i+1] == 'e'){
				//$word[$i] = $phonetic['uppercase_i'];
				$word[$i+1] = $phonetic['uppercase_i'].'\'';
				$i+=1;
			 }*/
		}
		//e
		if($word[$i] == 'e'){
			if(isset($word[$i+1]) && ($word[$i+1] == 'e' || $word[$i+1] == 'a')){
				if(isset($word[$i+2]) && ($word[$i+1] == 'e' && $word[$i+2] == 'r')){
					$word[$i] = $phonetic['uppercase_i'];
					$word[$i+1] = $phonetic['schwa'];
					$word[$i+2] = '';
					$i+=2;
				}else if(isset($word[$i+2]) && ($word[$i+1] == 'a' && $word[$i+2] == 'r')){
					$word[$i] = $phonetic['uppercase_i'];
					$word[$i+1] = $phonetic['schwa'];
					$word[$i+2] = '';
					$i+=2;
				}else{
					$word[$i] = $phonetic['double_e'];
					$word[$i+1] = $phonetic['ctlPeriod'];
					$i+=1;
				}
			}else if(isset($word[$i+1]) && $word[$i+1] == 'f'){
				if(isset($word[$i-1]) && $word[$i-1] == 'd'){
					$word[$i] = $phonetic['uppercase_i'].'\'';
				}else{
					$word[$i] = $phonetic['inverted_epsilon'];
				}
			}else if(isset($word[$i+1]) && $word[$i+1] == 'r'){
				if(isset($word[$i+2]) && $word[$i+2] == 'e'){
					$word[$i] = $phonetic['uppercase_i'];
					$word[$i+1] = $phonetic['schwa'];
					$word[$i+2] = '';
					$i+=2;
				}else if(isset($word[$i-1]) && $word[$i-1] == 'h'){
					$word[$i] = $phonetic['epsilon'];
					$word[$i+1] = $phonetic['ctlPeriod'];
					$word[$i+2] = '';
					$i+=2;
				}else{
					$word[$i] = $phonetic['schwa'];
					$word[$i+1] = '';
					$i+=1;
				}
			}else{
				$word[$i] = $phonetic['inverted_epsilon'];
			}
		}
		//h
		if($word[$i] == 'h'){
			if(isset($word[$i-1]) && $word[$i-1] == 'w'){
				$word[$i] = '';
			}
		}
		//i
		if($word[$i] == 'i'){
			if(isset($word[$i+1]) && $word[$i+1] == 'k'){
				if(isset($word[$i+2]) && $word[$i+2] == 'e'){
					$word[$i] = 'a';
					$word[$i+1] = $phonetic['uppercase_i'];
					$word[$i+2] = 'k';
					$i+=2;
				}else{
					$word[$i] = $phonetic['uppercase_i'];
				}
			}else{
				$word[$i] = $phonetic['uppercase_i'];
			}
		}
		
		//j
		if($word[$i] == 'j'){
			$word[$i] = $phonetic['j'];
		}
		
		//l
		if($word[$i] == 'l'){
			if(isset($word[$i+1]) && $word[$i+1] == 'l'){
				$word[$i+1] = '';
				$i+=1;
			}
		}
		
		//o
		if($word[$i] == 'o'){
			if(isset($word[$i+1]) && $word[$i+1] == 'i'){
				$word[$i] = $phonetic['inverted_c'];
				$word[$i+1] = $phonetic['uppercase_i'];
				$i+=1;
			}else if(isset($word[$i+1]) && $word[$i+1] == 'u'){
				if(isset($word[$i+2]) && $word[$i+2] == 'r'){
					$word[$i] = $phonetic['inverted_omega'];
					$word[$i+1] = $phonetic['schwa'];
					$i+=1;
				}else{
					$word[$i] = 'a';
					$word[$i+1] = $phonetic['inverted_omega'];
					$i+=1;
				}
			}else if(isset($word[$i+1]) && $word[$i+1] == 'w'){
				$word[$i] = $phonetic['schwa'];
				$word[$i+1] = $phonetic['inverted_omega'];
				$i+=1;
			}else if(isset($word[$i+1]) && $word[$i+1] == 'e'){
				$word[$i] = 'u';
				$word[$i+1] = $phonetic['ctlPeriod'];
				$i+=1;
			}else if(isset($word[$i+1]) && $word[$i+1] == 'o'){
				if(isset($word[$i+2]) && $word[$i+2] == 'r'){
					$word[$i] = $phonetic['inverted_c'];
					$word[$i+1] = $phonetic['ctlPeriod'];
					$word[$i+2] = '';
					$i+=2;
				}else if(isset($word[$i+2]) && $word[$i+2] == 'k'){
					if(isset($word[$i-1]) && $word[$i-1] == 'p'){
						$word[$i] = 'u';
						$word[$i+1] = $phonetic['ctlPeriod'];
						$i+=1;
					}else{
						$word[$i] = $phonetic['inverted_omega'];
						$word[$i+1] = '';
						$i+=1;
					}
				}else if(isset($word[$i+2]) && $word[$i+2] == 't'){
					$word[$i] = 'u';
					$word[$i+1] = $phonetic['ctlPeriod'];
					$i+=1;
				}else{
					$word[$i] = 'u';
					$word[$i+1] = $phonetic['ctlPeriod'];
					$i+=1;
				}
			}else if(isset($word[$i+1]) && $word[$i+1] == 'r'){
					$word[$i] = $phonetic['inverted_c'];
					$word[$i+1] = $phonetic['ctlPeriod'];
					$word[$i+2] = '';
					$i+=2;
			}else{
				$word[$i] = '&#594';
			}
		}
		
		//s
		if($word[$i] == 's'){
			if(isset($word[$i+1]) && $word[$i+1] == 'h'){
				$word[$i] = $phonetic['sh'];
				$word[$i+1] = '';
				$i+=1;
			}
		}
		
		//t
		if($word[$i] == 't'){
			if(isset($word[$i+1]) && $word[$i+1] == 't'){
				$word[$i] = 't';
				$word[$i+1] = '';
				$i+=1;
			}else if(isset($word[$i+1]) && $word[$i+1] == 'h'){
				if(isset($word[$i+2]) && $word[$i+2] == 'i'){
					$word[$i] = $phonetic['th_folwed_by_is'];
					$word[$i+1] = '';
				}else{
					$word[$i] = $phonetic['th'];
					$word[$i+1] = '';
				}
			}
		}
		
		//u
		if($word[$i] == 'u'){
			if(isset($word[$i+1]) && $word[$i+1] == 'k'){
				$word[$i] = 'ju';
				$word[$i+1] = $phonetic['ctlPeriod'];
				$word[$i+2] = 'k';
				$i+=2;
			}else{
				$word[$i] = $phonetic['wedge'];
			}
		}
    }

//End
$word = implode($word,'');
    echo 'The Phonetic spelling is: '.$word.'<br /><br />';
}
if(isset($_POST['word'])){
	?>
		<div><?php  phonetic($_POST['word']);?></div>
	
		<form action="" method="post">
			<input type="text" name="word" value="<?php echo $_POST['word']; ?>"/>
			<input type="submit" value="submit" />
		</form>
	<?php
}else{
	?>
		<form action="" method="post">
			<div> Enter Word: </div>
			<input type="text" name="word" value=""/>
			<input type="submit" value="submit" />
		</form>
	<?php
}

?>
