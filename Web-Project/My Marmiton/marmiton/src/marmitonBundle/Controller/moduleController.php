<?php

namespace marmitonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Security;

use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Model\UserManagerInterface; 
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;  
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
class moduleController extends Controller
{
	public function itemListAction()
	{

        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository('marmitonBundle:article')->findBy([], ['dateModification' => 'DESC'],4,0);

        return $this->render('marmitonBundle:Module:itemList.html.twig', array('articles'=> $articles));
    }
    public function postItemAction()
    {
        return $this->render('marmitonBundle:Module:postItem.html.twig');
    }
    public function itemThumbnailAction()
    {
        return $this->render('marmitonBundle:Module:itemThumbnail.html.twig' ,array(
            'url' => 'postItem',
            ));
    }
    
    public function testAction()
    {
      return $this->render('marmitonBundle:Module:test.html.twig');
  }
  public function adminAction($user = null)
  {

    if ($this->get('security.token_storage')->getToken()->getUser() == "anon.") 
    {
       $loginCharge = $this->forward('FOSUserBundle:Security:login');
       return $loginCharge;
   } 
   else if (true === $this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
   { 
       return $this->render('marmitonBundle:Module:dashBoardAdmin.html.twig');
   }
   else{
       return $this->render('marmitonBundle:Module:dashBoard.html.twig');
   }

}
public function categoryListAdminSelectAction()
{
    $em = $this->getDoctrine()->getManager();
    $em = $this->get('doctrine')->getManager();

    $repository = $em->getRepository('marmitonBundle:Category')->createQueryBuilder("p");
    $categories = $repository->select("p")
    ->distinct(true)
    ->getQuery()
    ->getResult();
    $categoriesTab = array();
    foreach ($categories as $key => $value) {
        $temp = explode(",", $value->getTagName());
        foreach ($temp as $key => $value) {
            array_push($categoriesTab , $value);
        }
    }
    array_unique($categoriesTab);

    $repository = $em->getRepository('marmitonBundle:Ingredient')->createQueryBuilder("p");
    $ingredients = $repository->select("p")
    ->distinct(true)
    ->getQuery()
    ->getResult();

    return $this->render('marmitonBundle:Module:postItem.html.twig', array('categories'=> $categoriesTab,'ingredients'=>$ingredients));
}
public function getItemAction(Request $request )
{
    $id = $request->query->get('id');

    $em = $this->getDoctrine()->getManager();
    $article = $em->getRepository('marmitonBundle:article')->findOneById($id);
    $textRaw = $article->getText();

    $text=[];
    $stageExist = strpos($textRaw, "_stage_");
    $subStageExist = strpos($textRaw, "_subStage_");
    $textRaw = str_replace("</div>", "", $textRaw);

    $textRaw = explode('<div>' ,$textRaw );

    $currentStage = -1;
    $cpt=0;
    array_shift($textRaw);
    if ($stageExist === false && $subStageExist === false)  {
        $text[0][0] = strip_tags($article->getText());
    }
    else{
        foreach ( $textRaw as $key => $value) {
            $stageExist2 = strstr($value, "\_stage\_");

            if (strstr($value, "_stage_")) {
                $currentStage ++;
                $cpt = 0;          
            }
            $temp = str_replace("_stage_", "", $value);
            $temp = str_replace("_/stage_", "", $temp);
            $temp = str_replace("_subStage_", "", $temp);
            $temp = str_replace("_/subStage_", "", $temp);
            $temp = str_replace("_textSubStage_", "", $temp);
            $temp = str_replace("_/textSubStage_", "", $temp);
            
            $text[$currentStage][$cpt] = $temp;
            $cpt++;
        }
    } 
    return $this->render('marmitonBundle:Module:getItem.html.twig', array('article'=> $article,'ratings'=>$article->getRatings(),"text"=>$text));
}
public function getUserInfoAction(Request $request )
{
    $id = $request->query->get('id');
    $em = $this->getDoctrine()->getManager();
    $user = $em->getRepository('utilisateursBundle:utilisateurs')->findOneById($id);

    return $this->render('marmitonBundle:Module:getUserInfo.html.twig', array('user'=> $user));
}        
public function getRatingAction(Request $request )
{
    $id = $request->query->get('id');
    $em = $this->getDoctrine()->getManager();
    $article = $em->getRepository('marmitonBundle:article')->findOneById($id);
    $rateGlobalTotal = 0;
    $cpt = 0;
    $rateGlobal=0;
    $rateIds = array();
    foreach ($article->getRatings() as $key => $value) {
        $cpt++;
        $rateGlobalTotal += $value->getRating();
        array_push($rateIds, $value->getUserId());
    }
    if ($cpt != 0) {
        $rateGlobal = $rateGlobalTotal / $cpt;
    }
    return $this->render('marmitonBundle:Module:getRating.html.twig', array('article'=> $article,'rate'=>$rateGlobal,'rateTotal'=>$cpt,'rateIds'=>$rateIds));        
}  

}