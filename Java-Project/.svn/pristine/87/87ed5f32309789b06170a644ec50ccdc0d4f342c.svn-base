package com.cours.dao.impl;

import com.cours.dao.IPersonneDao;
import com.cours.entities.Personne;
import com.cours.utils.Constants;

import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;
import org.json.simple.parser.ParseException;

public class JsonPersonneDaoImpl implements IPersonneDao {

    private final String personnesJsonPathFile = Constants.PERSONNES_JSON_PATH_FILE;

    @Override
    public Personne findById(int idPersonne) {

   		return this.findAll().get(idPersonne - 1);
    }

    @Override
    public Personne update(Personne obj) {


    	List<Personne> personnes = this.findAll();
    	personnes.get(obj.getIdPersonne()-1).setIdPersonne(obj.getIdPersonne());
    	personnes.get(obj.getIdPersonne()-1).setPrenom(obj.getPrenom());
    	personnes.get(obj.getIdPersonne()-1).setNom(obj.getNom());
    	personnes.get(obj.getIdPersonne()-1).setPoids(obj.getPoids());
    	personnes.get(obj.getIdPersonne()-1).setTaille(obj.getTaille());
    	personnes.get(obj.getIdPersonne()-1).setRue(obj.getRue());
    	personnes.get(obj.getIdPersonne()-1).setVille(obj.getVille());
    	personnes.get(obj.getIdPersonne()-1).setCodePostal(obj.getCodePostal());

        JSONArray list = new JSONArray();

        JSONObject objJson = new JSONObject();
        for (Personne i : personnes) {
            JSONObject objJsonLocal = new JSONObject();
            objJsonLocal.put("id" , i.getIdPersonne());
            objJsonLocal.put("prenom" , i.getPrenom());
            objJsonLocal.put("nom" , i.getNom());
            objJsonLocal.put("poids" , (int)i.getPoids());
            objJsonLocal.put("taille" , (int)i.getTaille());
            objJsonLocal.put("rue" , i.getRue());
            objJsonLocal.put("ville" , i.getVille());
            objJsonLocal.put("codePostal" , i.getCodePostal());
            list.add(objJsonLocal);
        	}
        objJson.put("personnes", list);
        try (FileWriter file = new FileWriter(personnesJsonPathFile)) {

            file.write(objJson.toJSONString());
            file.flush();

        } catch (IOException e) {
            e.printStackTrace();
        }
        return obj;
    }

    @Override
    public Personne create(Personne obj) {
    	List<Personne> personnes = this.findAll();
    	obj.setIdPersonne(personnes.size() + 1 );
    	personnes.add(obj);

        JSONArray list = new JSONArray();

        JSONObject objJson = new JSONObject();
        for (Personne i : personnes) {
            JSONObject objJsonLocal = new JSONObject();
            objJsonLocal.put("id" , i.getIdPersonne());
            objJsonLocal.put("prenom" , i.getPrenom());
            objJsonLocal.put("nom" , i.getNom());
            objJsonLocal.put("poids" , (int)i.getPoids());
            objJsonLocal.put("taille" , (int)i.getTaille());
            objJsonLocal.put("rue" , i.getRue());
            objJsonLocal.put("ville" , i.getVille());
            objJsonLocal.put("codePostal" , i.getCodePostal());
            list.add(objJsonLocal);
        	}
        objJson.put("personnes", list);
        try (FileWriter file = new FileWriter(personnesJsonPathFile)) {

            file.write(objJson.toJSONString());
            file.flush();

        } catch (IOException e) {
            e.printStackTrace();
        }
        return obj;
    }

    @Override
    public boolean delete(Personne person) {
    	List<Personne> personnes = this.findAll();
    	personnes.remove(person.getIdPersonne());

        JSONArray list = new JSONArray();

        JSONObject objJson = new JSONObject();
        int j=0;
        for (Personne i : personnes) {
        	j++;
            JSONObject objJsonLocal = new JSONObject();
            objJsonLocal.put("id" , j);
            objJsonLocal.put("prenom" , i.getPrenom());
            objJsonLocal.put("nom" , i.getNom());
            objJsonLocal.put("poids" , (int)i.getPoids());
            objJsonLocal.put("taille" , (int)i.getTaille());
            objJsonLocal.put("rue" , i.getRue());
            objJsonLocal.put("ville" , i.getVille());
            objJsonLocal.put("codePostal" , i.getCodePostal());
            list.add(objJsonLocal);
        	}
        objJson.put("personnes", list);
        try (FileWriter file = new FileWriter(personnesJsonPathFile)) {

            file.write(objJson.toJSONString());
            file.flush();
            return true;

        } catch (IOException e) {
            e.printStackTrace();
            return false;
        }
    }

    @Override
    public List<Personne> findAll() {
    	List<Personne> personnes = new ArrayList<Personne>();
        JSONParser parser = new JSONParser();
        Object obj = null;
		try {
			obj = parser.parse(new FileReader(personnesJsonPathFile));
		} catch (IOException | ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

        JSONObject jsonObject = (JSONObject) obj;
        //System.out.println(jsonObject);

        JSONArray personneArrayJson = (JSONArray) jsonObject.get("personnes");
        if (personneArrayJson != null) { 
        	   int len = personneArrayJson.size();
        	   for (int i=0;i<len;i++){ 
        	        Personne returnedPersonne = new Personne();
        	        returnedPersonne.setIdPersonne(((Long)((JSONObject)personneArrayJson.get(i)).get("id")).intValue());
        			returnedPersonne.setPrenom(((String)((JSONObject)personneArrayJson.get(i)).get("prenom")));
        			returnedPersonne.setNom(((String)((JSONObject)personneArrayJson.get(i)).get("nom")));
        			returnedPersonne.setPoids(((Long)((JSONObject)personneArrayJson.get(i)).get("poids")));
        			returnedPersonne.setTaille(((Long)((JSONObject)personneArrayJson.get(i)).get("taille")));
        			returnedPersonne.setRue(((String)((JSONObject)personneArrayJson.get(i)).get("rue")));
        			returnedPersonne.setVille(((String)((JSONObject)personneArrayJson.get(i)).get("ville")));
        			returnedPersonne.setCodePostal(((String)((JSONObject)personneArrayJson.get(i)).get("codePostal")));
         		   personnes.add(returnedPersonne);
        	   } 
        	} 
return personnes;
    }
}
