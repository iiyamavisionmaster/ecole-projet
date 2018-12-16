<?php
namespace marmitonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use marmitonBundle\Entity\Category;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class SiteController extends Controller
{
    public function footerAction()
    {
        return $this->render('marmitonBundle:Site:footer.html.twig');
    }
    public function headerAction()
    {
        return $this->render('marmitonBundle:Site:header.html.twig');
    }
    public function navigationAction()
    {
        return $this->render('marmitonBundle:Site:navigation.html.twig');
    }
    public function headerCarouselAction(Request $request)
    {

        $search = $request->request->get('searchVal');
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
        return $this->render('marmitonBundle:Site:headerCarousel.html.twig', array('categories'=> $categoriesTab));
    }
    public function navigationAdminAction()
    {
        return $this->render('marmitonBundle:Site:navigationAdmin.html.twig');
    }
}
?>