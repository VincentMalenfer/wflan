<?php


namespace Model;

use \W\Model\Model as Model;

class ArticlesModel extends Model{

	public function ajouterArticle($title, $text, $picture, $publishdate, $autor, $users_idusers){
		$this->setPrimaryKey("idarticles");
		$data = array 	(
							"title" 		=> $title,
							"text" 			=> $text,
							"pictures" 		=> $picture,
							"publishdate"	=> $publishdate,
							"author"			=> $autor,
							"users_idusers" => $users_idusers
						);

		return $this->insert($data);
	}


	public function getArticles(){
		return $this->findAll();
	}

	public function getArticle($id){
		$this->setPrimaryKey("idarticles");
		return $this->find($id);
	}
}

