package com.cours.dao.impl;

import com.cours.dao.IPersonneDao;
import com.cours.dao.SqlConnection;
import com.cours.entities.Personne;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

import org.json.simple.JSONObject;

public class SqlPersonneDaoImpl implements IPersonneDao {

    public final static String className = SqlPersonneDaoImpl.class.getName();
    /**
     * L'instance de connexion à la database
     */

    public Connection connection = SqlConnection.getInstance();

    @Override
    public Personne findById(int idPersonne) {
   		return this.findAll().get(idPersonne - 1);
    }

    @Override
    public Personne update(Personne obj) {

    	List<Personne> personnes = new ArrayList<Personne>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("UPDATE `personne` SET Prenom=\'"+obj.getNom()+"\',Nom=\'"+obj.getPrenom()+"\',Poids=\'"+obj.getPoids()+"\',Taille=\'"+obj.getTaille()+"\',Rue=\'"+obj.getRue()+"\',Ville=\'"+obj.getVille()+"\',CodePostal=\'"+obj.getCodePostal()+"\' where IdPersonne =\'"+ obj.getIdPersonne() + "\';");

	    	} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public Personne create(Personne obj) {

    	List<Personne> personnes = new ArrayList<Personne>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("UPDATE personne AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT IdPersonne, @newID := @newID + 1 AS newID\r\n" + 
					"FROM personne\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY IdPersonne) AS new ON t1.IdPersonne = new.IdPersonne\r\n" + 
					"SET t1.IdPersonne = new.newID;");
			rs = stmt.executeUpdate("INSERT INTO `personne`( `Prenom`, `Nom`, `Poids`, `Taille`, `Rue`, `Ville`, `CodePostal`) VALUES (\'"+obj.getNom()+"\',\'"+obj.getPrenom()+"\',\'"+obj.getPoids()+"\',\'"+obj.getTaille()+"\',\'"+obj.getRue()+"\',\'"+obj.getVille()+"\',\'"+obj.getCodePostal()+"\');");
			} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return obj;
    }

    @Override
    public boolean delete(Personne person) {
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();
			int rs = stmt.executeUpdate("DELETE FROM personne WHERE IdPersonne=" + person.getIdPersonne());
			rs = stmt.executeUpdate("UPDATE personne AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT IdPersonne, @newID := @newID + 1 AS newID\r\n" + 
					"FROM personne\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY IdPersonne) AS new ON t1.IdPersonne = new.IdPersonne\r\n" + 
					"SET t1.IdPersonne = new.newID;");
	        return true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
	        return false;
		}
    }

    @Override
    public List<Personne> findAll() {
    	List<Personne> personnes = new ArrayList<Personne>();
    	Statement stmt;
		try {
			stmt = this.connection.createStatement();

			int rs2 = stmt.executeUpdate("UPDATE personne AS t1\r\n" + 
					"JOIN (\r\n" + 
					"SELECT IdPersonne, @newID := @newID + 1 AS newID\r\n" + 
					"FROM personne\r\n" + 
					"JOIN (SELECT @newID := -1) AS vars\r\n" + 
					"ORDER BY IdPersonne) AS new ON t1.IdPersonne = new.IdPersonne\r\n" + 
					"SET t1.IdPersonne = new.newID;");
			ResultSet rs = stmt.executeQuery("select * from Personne");

     	   while (rs.next()){ 

    	        Personne returnedPersonne = new Personne();
    	        returnedPersonne.setIdPersonne(rs.getInt("IdPersonne"));
    			returnedPersonne.setPrenom(rs.getString("Prenom"));
    			returnedPersonne.setNom(rs.getString("Nom"));
    			returnedPersonne.setPoids(rs.getLong("Poids"));
    			returnedPersonne.setTaille(rs.getLong("Taille"));
    			returnedPersonne.setRue(rs.getString("Rue"));
    			returnedPersonne.setVille(rs.getString("Ville"));
    			returnedPersonne.setCodePostal(rs.getString("CodePostal"));
     		   personnes.add(returnedPersonne);
				}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    	return personnes;
    }
}
