package com.cours.main;

import com.cours.dao.IPersonneDao;
import com.cours.dao.factory.AbstractDaoFactory;
import com.cours.dao.factory.FactoryType;
import com.cours.entities.Personne;

public class MainDao {

    public static void main(String[] args) {
        // TODO code application logic here
//        IPersonneDao personneDaoManual = AbstractDaoFactory.getDaoFactory(FactoryType.MANUAL_DAO).getPersonneDao();
//        Personne p = new Personne();
//        p.setIdPersonne(0);
//        p.setPrenom("ayoub");
//        p.setNom("belkadi");
//        p.setPoids(100.0);
//        p.setTaille(93.0);
//        p.setRue("11 rue dalésia");
//        p.setVille("Paris");
//        p.setCodePostal("75014");
//        personneDaoManual.create(p);
//        Personne p2 = new Personne();
//        p2.setIdPersonne(1);
//        p2.setPrenom("ayoub");
//        p2.setNom("belkadi");
//        p2.setPoids(100.0);
//        p2.setTaille(93.0);
//        p2.setRue("11 rue dalésia");
//        p2.setVille("Paris");
//        p2.setCodePostal("75014");
//        personneDaoManual.create(p2);
//        //personneDaoManual.delete(p2);
//        Personne p3 = new Personne();
//        p3.setIdPersonne(1);
//        p3.setPrenom("ayoub2");
//        p3.setNom("belkadi2");
//        p3.setPoids(100.0);
//        p3.setTaille(93.0);
//        p3.setRue("11 rue dalésia");
//        p3.setVille("Paris");
//        p3.setCodePostal("75014");
//        personneDaoManual.update(p3);
//        
//        System.out.println("MANUAL_DAO findAll() : " + personneDaoManual.findAll());
        //System.out.println("get  : " + personneDaoManual.findById(0));
        
        
//      Personne p3 = new Personne();
//      p3.setIdPersonne(1);
//      p3.setPrenom("ayoub2");
//      p3.setNom("belkadi2");
//      p3.setPoids(100.0);
//      p3.setTaille(93.0);
//      p3.setRue("11 rue dalésia");
//      p3.setVille("Paris");
//      p3.setCodePostal("75014");
//      personneDaoManual.update(p3); 
//        IPersonneDao personneDaoCsv = AbstractDaoFactory.getDaoFactory(FactoryType.CSV_DAO).getPersonneDao();
        //personneDaoCsv.update(p3);
        //personneDaoCsv.create(p3);
//        personneDaoCsv.delete(p3);
        //System.out.println("CSV_DAO findById() : " + personneDaoCsv.findById(23));
        //System.out.println("CSV_DAO findAll() : " + personneDaoCsv.findAll());
        
        
        
        
        
        
        
        
    	//        IPersonneDao personneDaoJson = AbstractDaoFactory.getDaoFactory(FactoryType.JSON_DAO).getPersonneDao();
//      Personne p3 = new Personne();
//      p3.setIdPersonne(1);
//      p3.setPrenom("ayoub2");
//      p3.setNom("belkadi2");
//      p3.setPoids(100.0);
//      p3.setTaille(93.0);
//      p3.setRue("11 rue dalésia");
//      p3.setVille("Paris");
//      p3.setCodePostal("75014");
//      personneDaoJson.create(p3);
      //personneDaoJson.delete(p3);
//      personneDaoJson.update(p3);
//        System.out.println("JSON_DAO findAll() : " + personneDaoJson.findAll());
        //System.out.println("JSON_DAO findById() : " + personneDaoJson.findById(22));
        
        
        
        
        
        
        

        IPersonneDao personneDaoXml = AbstractDaoFactory.getDaoFactory(FactoryType.XML_DAO).getPersonneDao();
      Personne p3 = new Personne();
      p3.setIdPersonne(1);
      p3.setPrenom("ayoub2");
      p3.setNom("belkadi2");
      p3.setPoids(100.0);
      p3.setTaille(93.0);
      p3.setRue("11 rue dalésia");
      p3.setVille("Paris");
      p3.setCodePostal("75014");
      //personneDaoXml.create(p3);
      //personneDaoXml.delete(p3);
      personneDaoXml.update(p3);
//        System.out.println("JSON_DAO findAll() : " + personneDaoXml.findAll());
//        System.out.println("JSON_DAO findById() : " + personneDaoXml.findById(10));
        
        
        

//        IPersonneDao personneDaoSql = AbstractDaoFactory.getDaoFactory(FactoryType.SQL_DAO).getPersonneDao();
//      Personne p3 = new Personne();
//      p3.setIdPersonne(2);
//      p3.setPrenom("ayoub4");
//      p3.setNom("belkadi4");
//      p3.setPoids(100.0);
//      p3.setTaille(93.0);
//      p3.setRue("11 rue dalésia");
//      p3.setVille("Paris");
//      p3.setCodePostal("75014");
//      personneDaoSql.update(p3);
      //personneDaoSql.delete(p3);
//      personneDaoJson.update(p3);
        //System.out.println("JSON_DAO findAll() : " + personneDaoSql.findAll());
        //System.out.println("JSON_DAO findById() : " + personneDaoSql.findById(14));
    }
}
