<?php
						// API E-GOV UNTUK HANDLE REQUEST DATA ROLE
						
						$DB_USER        = 'root';
						$DB_PASS        = 'layanan-325704:asia-southeast2:layanan';
						$DB_NAME        = 'notif';
						
						$this_user_key  = '6929d-2b09d78b2105445dc154486c8891c241';
						$this_user_pass = '59857b7e2d';
						
					
						if(isset($_POST['user_key']) && isset($_POST['pass_key'])){
							extract($_POST);
							if($user_key!=$this_user_key || $pass_key!=$this_user_pass){
								echo json_encode([
									'alert'     => ['class'    => 'danger', 'capt'     => '<strong>Error</strong> Api key tidak valid, silahkan coba lagi!']
								]);
								exit();
							}
							$k = new mysqli('34.101.161.26', $DB_USER, $DB_PASS, $DB_NAME);
					
							if($method=='get'){
								$role = $k->query("SELECT * FROM tb_role ORDER BY 'id' DESC");
								$data = array();
								foreach($role as $r){
									$data[] = $r;
								}
								echo json_encode([
									'data'      => $data,
								]);
					
							}else if($method=='getone'){
								$role = $k->query("SELECT * FROM tb_role WHERE role_id='$role_id\'");
								echo json_encode([
									'data'      => mysqli_fetch_array($role),
								]);
								
							}
							exit();    
						}
						
						echo json_encode([
							'alert'     => ['class'    => 'danger', 'capt'     => 'Api key tidak valid, silahkan coba lagi!']
						]);
					