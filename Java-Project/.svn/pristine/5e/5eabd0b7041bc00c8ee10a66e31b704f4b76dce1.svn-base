package com.cours.dao.impl;

import com.cours.dao.IPersonneDao;
import com.cours.entities.Personne;
import com.cours.utils.Constants;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.stream.Collectors;

public class CsvPersonneDaoImpl implements IPersonneDao {

    private final String personnesCsvPathFile = Constants.PERSONNES_CSV_PATH_FILE;

    @Override
    public Personne findById(int idPersonne) {
   		return this.findAll().get(idPersonne - 1);
    }

    @Override
    public Personne update(Personne obj) {
    	List<Personne> all = this.findAll();
        all.get(obj.getIdPersonne()-1).setIdPersonne(obj.getIdPersonne());
        all.get(obj.getIdPersonne()-1).setPrenom(obj.getPrenom());
        all.get(obj.getIdPersonne()-1).setNom(obj.getNom());
        all.get(obj.getIdPersonne()-1).setPoids(obj.getPoids());
        all.get(obj.getIdPersonne()-1).setTaille(obj.getTaille());
        all.get(obj.getIdPersonne()-1).setRue(obj.getRue());
        all.get(obj.getIdPersonne()-1).setVille(obj.getVille());
        all.get(obj.getIdPersonne()-1).setCodePostal(obj.getCodePostal());
    	String csvFile = personnesCsvPathFile;
        BufferedReader br = null;
        String line = "";
	   try {
		   FileWriter writer = new FileWriter(csvFile);    
		   writer.write("﻿idPersonne;Prenom;Nom;Poids;Taille;Rue;Ville;Code Postal\n");
			
		   for (Personne i : all) {
			    writer.write(i.getIdPersonne() + ";" + i.getNom() + ";" + i.getPrenom() + ";" + i.getPoids() + ";" + i.getTaille() + ";" + i.getRue() + ";" + i.getVille() + ";" + i.getCodePostal()+ "\n");
			}
		    writer.close();
	   } catch (FileNotFoundException e) {
	       e.printStackTrace();
	   } catch (IOException e) {
	       e.printStackTrace();
	   } finally {
	       if (br != null) {
	           try {
	               br.close();
	           } catch (IOException e) {
	               e.printStackTrace();
	           }
	       }
	   }
        return all.get(obj.getIdPersonne()-1);
    }

    @Override
    public Personne create(Personne obj) {
    	List<Personne> all = this.findAll();
    	obj.setIdPersonne(all.size()+1);
    	all.add(obj);
        String csvFile = personnesCsvPathFile;
        BufferedReader br = null;
        String line = "";
	   try {
		   FileWriter writer = new FileWriter(csvFile);    
		   writer.write("﻿idPersonne;Prenom;Nom;Poids;Taille;Rue;Ville;Code Postal\n");
			
		   for (Personne i : all) {
			    writer.write(i.getIdPersonne() + ";" + i.getNom() + ";" + i.getPrenom() + ";" + i.getPoids() + ";" + i.getTaille() + ";" + i.getRue() + ";" + i.getVille() + ";" + i.getCodePostal()+ "\n");
			}
		    writer.close();
	   } catch (FileNotFoundException e) {
	       e.printStackTrace();
	   } catch (IOException e) {
	       e.printStackTrace();
	   } finally {
	       if (br != null) {
	           try {
	               br.close();
	           } catch (IOException e) {
	               e.printStackTrace();
	           }
	       }
	   }
        return all.get(obj.getIdPersonne()-1);
    }

    @Override
    public boolean delete(Personne person) {
    	List<Personne> all = this.findAll();
    	all.remove(person.getIdPersonne()-1);
        String csvFile = personnesCsvPathFile;
        BufferedReader br = null;
        String line = "";
	   try {
		   FileWriter writer = new FileWriter(csvFile);    
		   writer.write("﻿idPersonne;Prenom;Nom;Poids;Taille;Rue;Ville;Code Postal\n");
			int j=0;
		   for (Personne i : all) {
			   j++;
			    writer.write(j + ";" + i.getNom() + ";" + i.getPrenom() + ";" + (int)i.getPoids() + ";" + (int)i.getTaille() + ";" + i.getRue() + ";" + i.getVille() + ";" + i.getCodePostal()+ "\n");
			}
		    writer.close();
	        return true;
	   } catch (FileNotFoundException e) {
	       e.printStackTrace();
	        return false;
	   } catch (IOException e) {
	       e.printStackTrace();
	        return false;
	   } finally {
	       if (br != null) {
	           try {
	               br.close();
	           } catch (IOException e) {
	               e.printStackTrace();
	           }
	       }
	   }
    }

    @Override
    public List<Personne> findAll() {

    	ArrayList<Personne> personnes = new ArrayList<Personne>();
    	String csvFile = personnesCsvPathFile;
        BufferedReader br = null;
        String line = "";
        int i = 0;
	   try {
	       br = new BufferedReader(new FileReader(csvFile));
	       while ((line = br.readLine()) != null) {
	           String[] personnesElem = line.split(";");
	           if(i!=0) {

	               Personne returnedPersonne = new Personne();
	               returnedPersonne.setIdPersonne(Integer.parseInt(personnesElem[0].trim()));
	               returnedPersonne.setPrenom(personnesElem[1].trim());
	               returnedPersonne.setNom(personnesElem[2].trim());
	               returnedPersonne.setPoids(Float.parseFloat(personnesElem[3].trim()));
	               returnedPersonne.setTaille(Float.parseFloat(personnesElem[4].trim()));
	               returnedPersonne.setRue(personnesElem[5].trim());
	               returnedPersonne.setVille(personnesElem[6].trim());
	               returnedPersonne.setCodePostal(personnesElem[7].trim());
	        	   personnes.add(returnedPersonne);
	        	   }
	           
	           i++;
	       }
	   } catch (FileNotFoundException e) {
	       e.printStackTrace();
	   } catch (IOException e) {
	       e.printStackTrace();
	   } finally {
	       if (br != null) {
	           try {
	               br.close();
	           } catch (IOException e) {
	               e.printStackTrace();
	           }
	       }
	   }
   		return personnes;
    }
}
