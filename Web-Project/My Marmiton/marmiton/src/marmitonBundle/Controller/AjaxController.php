<?php

namespace marmitonBundle\Controller;
use marmitonBundle\Entity\article;
use marmitonBundle\Entity\Category;
use marmitonBundle\Entity\Picture;
use marmitonBundle\Entity\comments;
use marmitonBundle\Entity\Ratings;
use Yoda\EventBundle\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface as Container;

class AjaxController extends Controller
{
	public function postItemAjaxAction(Request $request )
	{
		$title = $request->request->get('title');
		$text = $request->request->get('text');
		$categorys = $request->request->get('category');

		$em = $this->get('doctrine')->getManager();

		$article = $em->getRepository('marmitonBundle:article')->findAll();

		foreach ($article as $key => $value) {
			$textRaw = $value->getText();
			$similar =similar_text($textRaw, $text, $similarity);
			if ($similarity>=85) {

				return new Response("Une autre recette est identique a la votre.Votre recette n'a pas été ajouté");
			}
		}


		$article = new article();

		$article->setText($text);
		$article->setTitle($title);
		$date = new \DateTime();
		$article->setDateCreation($date);
		$article->setDateModification($date);
		$article->setUserId($this->getUser()->getId());
		
		$article->setEstimedTimeDish(1);


		$category = new Category();
		$category->setTagName($categorys);
		$em->persist($category);
		
		$file = $request->files->get('picture');
		$name = basename($_FILES["picture"]["name"]);
		$picture = new Picture();
		$picture->setFile($file);
		$picture->setName($name);
		$em->persist($picture);
		

		$article->setCategoryId($category);
		$article->setImageId($picture);
		$em->persist($article);

		$em->flush();
		return new Response("Votre recette est ajouté");
	}
	public function postCommentAjaxAction(Request $request )
	{   
		$id = $request->request->get('id');
		$text = $request->request->get('text');

		$em = $this->get('doctrine')->getManager();
		$article = $em->getRepository('marmitonBundle:article')->findOneById($id);

		$comments = new comments();
		$comments->setText($text);
		$comments->setUserId($article->getUserId());
		
		$article->addComments($comments);	
		$em->persist($article);

		$em->flush();
		return new Response();
	}
	public function postRatingAjaxAction(Request $request )
	{
		$articleId = $request->request->get('articleId');
		$rate = $request->request->get('rate');
		$userId = $request->request->get('userId');

		$em = $this->get('doctrine')->getManager();

		$article = $em->getRepository('marmitonBundle:article')->findOneById($articleId);

		$ratings = new ratings();
		$ratings->setRating($rate);
		$ratings->setUserId($userId);
		
		$article->addRating($ratings);	
		$em->persist($article);

		$em->flush();	 
		return new Response();
	}
	public function getArticleAjaxAction(Request $request )
	{
		$selectCategory = $request->request->get('selectCategory');
		
		$search = $request->request->get('searchVal');
		$em = $this->get('doctrine')->getManager();

		$repository = $em->getRepository('marmitonBundle:article');
		$query = $repository->createQueryBuilder('p')
		->where('p.title LIKE :word')
		->orWhere('p.text LIKE :word')
		->orWhere('pa.tagName LIKE :selectCategory')
		->join('p.categoryId', 'pa')
		->setParameter('word','%'.$search.'%' )
		->setParameter('selectCategory', '%'.$selectCategory.'%')
		->addOrderBy('p.dateModification', 'DESC')
		->getQuery();
		$article = $query->getResult();
		return $this->render('marmitonBundle:Module:itemSearch.html.twig', array('articles'=> $article));
	}

	public function itemListAjaxAction(Request $request)
	{


		$cacheOffset = $request->request->get('cacheOffset');
		$cacheLimit = $request->request->get('cacheLimit');
		$em = $this->getDoctrine()->getManager();
		$articles = $em->getRepository('marmitonBundle:article')->findBy([], ['dateModification' => 'DESC'],$cacheLimit,$cacheOffset);

		return $this->render('marmitonBundle:Module:itemList.html.twig', array('articles'=> $articles));
	}
}