<?php
	namespace Applications\App\Modules\Compte;

	class CompteController extends \Library\BackController {
		public function executeUserProfil(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Mon profil');

			$profil = $this->managers->getManagerOf('User')->get($this->app->user()->getAttribute('RefUsers'));
			
			$this->page->addVar('profil',$profil);
		}
		public function executeUserCheckPassword(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Mon profil - Changer de mot de passe');

			$profil = $this->managers->getManagerOf('User')->get($this->app->user()->getAttribute('RefUsers'));

			if ($request->method() == 'POST') {
				if (password_verify($request->postData('password'),$profil['password'])) {
		            $this->app->httpResponse()->redirect('/Compte/new-password');
		        } else {
					$_SESSION['message']['type'] = 'error';
		            $_SESSION['message']['text'] = 'Mot de passe incorrect !';
		            $_SESSION['message']['number'] = 2;
				}
			}
			
			$this->page->addVar('profil',$profil);
		}
		public function executeUserNewPassword(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Mon profil - Changer de mot de passe');

			if ($request->method() == 'POST') {
				if ($request->postData('password') == $request->postData('password_conf')) {
					$this->managers->getManagerOf('User')->setPassword($this->app->user()->getAttribute('RefUsers'),password_hash($request->postData('password'),PASSWORD_BCRYPT));
					$this->app->httpResponse()->redirect('/Compte/profil');
				} else {
					$_SESSION['message']['type'] = 'error';
		            $_SESSION['message']['text'] = 'Le mot de passe et le mot de passe de confirmation ne correspondent pas !';
		            $_SESSION['message']['number'] = 2;
				}
			}

			$profil = $this->managers->getManagerOf('User')->get($this->app->user()->getAttribute('RefUsers'));
			
			$this->page->addVar('profil',$profil);
		}
		public function executeChangeUsername(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Mon profil - Changer d\'identifiant');

			if ($request->method() == 'POST') {
				$this->managers->getManagerOf('User')->setUsername($this->app->user()->getAttribute('RefUsers'),$request->postData('username'));
				$_SESSION['message']['type'] = 'success';
	            $_SESSION['message']['text'] = 'Identifiant modifié !';
	            $_SESSION['message']['number'] = 2;
				$this->app->httpResponse()->redirect('/Compte/profil');
			}

			$profil = $this->managers->getManagerOf('User')->get($this->app->user()->getAttribute('RefUsers'));
			
			$this->page->addVar('profil',$profil);
		}
		public function executeListe(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Liste des utilisateurs');

			$comptes = $this->managers->getManagerOf('User')->getListe();
			$this->page->addVar('comptes',$comptes);
		}
		public function executeAdd(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Ajout d\'un utilisateur');

			if ($request->method() == 'POST') {
				$this->managers->getManagerOf('User')->add($request);
				$_SESSION['message']['type'] = 'success';
	            $_SESSION['message']['text'] = 'Ajout réussie !';
	            $_SESSION['message']['number'] = 2;
				$this->app->httpResponse()->redirect('/Compte/liste');
			}
			$statuts = $this->managers->getManagerOf('User')->getStatuts();
			$this->page->addVar('statuts',$statuts);
		}
		public function executeUpdate(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Modification le compte');

			if ($request->method() == 'POST') {
				$this->managers->getManagerOf('User')->update($request);
				$_SESSION['message']['type'] = 'success';
	            $_SESSION['message']['text'] = 'Modification réussie !';
	            $_SESSION['message']['number'] = 2;
				$this->app->httpResponse()->redirect('/Compte/liste');
			} else {
				$compte = $this->managers->getManagerOf('User')->get($request->getData('id'));
				$this->page->addVar('compte',$compte);
			}
			$statuts = $this->managers->getManagerOf('User')->getStatuts();
			$this->page->addVar('statuts',$statuts);
		}
		public function executeDelete(\Library\HTTPRequest $request) {
			$this->page->addVar('titles','Suppression du compte');

			$this->managers->getManagerOf('User')->delete($request->getData('id'));
			$_SESSION['message']['type'] = 'success';
            $_SESSION['message']['text'] = 'Suppression réussie !';
            $_SESSION['message']['number'] = 2;
			$this->app->httpResponse()->redirect('/Compte/liste');
		}
	}