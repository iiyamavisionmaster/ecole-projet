package com.cours.dao.impl;

import com.cours.dao.IPersonneDao;
import com.cours.entities.Personne;
import com.cours.utils.Constants;

import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;
import javax.xml.transform.OutputKeys;
import javax.xml.transform.Transformer;
import javax.xml.transform.TransformerException;
import javax.xml.transform.TransformerFactory;
import javax.xml.transform.dom.DOMSource;
import javax.xml.transform.stream.StreamResult;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NodeList;
import org.xml.sax.SAXException;

public class XmlPersonneDaoImpl implements IPersonneDao {

    private final String personnesXmlPathFile = Constants.PERSONNES_XML_PATH_FILE;

    @Override
    public Personne findById(int idPersonne) {

   		return this.findAll().get(idPersonne - 1);
    }

    @Override
    public Personne update(Personne obj) {
 	   try {

	        DocumentBuilderFactory dFact = DocumentBuilderFactory.newInstance();
	        DocumentBuilder build = dFact.newDocumentBuilder();
	        Document doc = build.newDocument();

	        Element root = doc.createElement("personnes");
	        doc.appendChild(root);
	    	List<Personne> personnes = this.findAll();
	    	personnes.get(obj.getIdPersonne() - 1).setIdPersonne(obj.getIdPersonne());
	    	personnes.get(obj.getIdPersonne() - 1).setPrenom(obj.getPrenom());
	    	personnes.get(obj.getIdPersonne() - 1).setNom(obj.getNom());
	    	personnes.get(obj.getIdPersonne() - 1).setPoids(obj.getPoids());
	    	personnes.get(obj.getIdPersonne() - 1).setTaille(obj.getTaille());
	    	personnes.get(obj.getIdPersonne() - 1).setRue(obj.getRue());
            personnes.get(obj.getIdPersonne() - 1).setVille(obj.getVille());
            personnes.get(obj.getIdPersonne() - 1).setCodePostal(obj.getCodePostal());
	    	int i = 0;
	    	for (Personne p : personnes) {
	    		i++;
   	        Element Details = doc.createElement("personne");
   	        Details.setAttribute("id", String.valueOf(i));
   	        root.appendChild(Details);
	            Element prenom = doc.createElement("prenom");
	            prenom.appendChild(doc.createTextNode(String.valueOf(p.getPrenom())));
	            Element nom = doc.createElement("nom");
	            nom.appendChild(doc.createTextNode(String.valueOf(p.getNom())));
	            Element poids = doc.createElement("poids");
	            poids.appendChild(doc.createTextNode(String.valueOf(p.getPoids())));
	            Element taille = doc.createElement("taille");
	            taille.appendChild(doc.createTextNode(String.valueOf(p.getTaille())));
	            Element rue = doc.createElement("rue");
	            rue.appendChild(doc.createTextNode(String.valueOf(p.getRue())));
	            Element ville = doc.createElement("ville");
	            ville.appendChild(doc.createTextNode(String.valueOf(p.getVille())));
	            Element codePostal = doc.createElement("codePostal");
	            codePostal.appendChild(doc.createTextNode(String.valueOf(p.getCodePostal())));

	            Details.appendChild(prenom);
	            Details.appendChild(nom);
	            Details.appendChild(poids);
	            Details.appendChild(taille);
	            Details.appendChild(rue);
	            Details.appendChild(ville);
	            Details.appendChild(codePostal);
	        }
	        // Save the document to the disk file
	        TransformerFactory tranFactory = TransformerFactory.newInstance();
	        Transformer aTransformer = tranFactory.newTransformer();
	        // format the XML nicely
	        aTransformer.setOutputProperty(OutputKeys.ENCODING, "UTF-8");
	        aTransformer.setOutputProperty(
	                "{http://xml.apache.org/xslt}indent-amount", "4");
	        aTransformer.setOutputProperty(OutputKeys.INDENT, "yes");
	        DOMSource source = new DOMSource(doc);
	        try {
	            // location and name of XML file you can change as per need
	            FileWriter fos = new FileWriter(this.personnesXmlPathFile);
	            StreamResult result = new StreamResult(fos);
	            aTransformer.transform(source, result);
	        } catch (IOException e) {
	            e.printStackTrace();
	        }
	    } catch (TransformerException ex) {
	        System.out.println("Error outputting document");
	    } catch (ParserConfigurationException ex) {
	        System.out.println("Error building document");
	    }
	return obj;
    }

    @Override
    public Personne create(Personne obj) {
    	   try {

    	        DocumentBuilderFactory dFact = DocumentBuilderFactory.newInstance();
    	        DocumentBuilder build = dFact.newDocumentBuilder();
    	        Document doc = build.newDocument();

    	        Element root = doc.createElement("personnes");
    	        doc.appendChild(root);
    	    	List<Personne> personnes = this.findAll();
    	    	personnes.add(obj);
    	    	int i = 0;
    	    	for (Personne p : personnes) {
    	    		i++;
        	        Element Details = doc.createElement("personne");
        	        Details.setAttribute("id", String.valueOf(i));
        	        root.appendChild(Details);
    	            Element prenom = doc.createElement("prenom");
    	            prenom.appendChild(doc.createTextNode(String.valueOf(p.getPrenom())));
    	            Element nom = doc.createElement("nom");
    	            nom.appendChild(doc.createTextNode(String.valueOf(p.getNom())));
    	            Element poids = doc.createElement("poids");
    	            poids.appendChild(doc.createTextNode(String.valueOf(p.getPoids())));
    	            Element taille = doc.createElement("taille");
    	            taille.appendChild(doc.createTextNode(String.valueOf(p.getTaille())));
    	            Element rue = doc.createElement("rue");
    	            rue.appendChild(doc.createTextNode(String.valueOf(p.getRue())));
    	            Element ville = doc.createElement("ville");
    	            ville.appendChild(doc.createTextNode(String.valueOf(p.getVille())));
    	            Element codePostal = doc.createElement("codePostal");
    	            codePostal.appendChild(doc.createTextNode(String.valueOf(p.getCodePostal())));

    	            Details.appendChild(prenom);
    	            Details.appendChild(nom);
    	            Details.appendChild(poids);
    	            Details.appendChild(taille);
    	            Details.appendChild(rue);
    	            Details.appendChild(ville);
    	            Details.appendChild(codePostal);
    	        }
    	        // Save the document to the disk file
    	        TransformerFactory tranFactory = TransformerFactory.newInstance();
    	        Transformer aTransformer = tranFactory.newTransformer();
    	        // format the XML nicely
    	        aTransformer.setOutputProperty(OutputKeys.ENCODING, "UTF-8");
    	        aTransformer.setOutputProperty(
    	                "{http://xml.apache.org/xslt}indent-amount", "4");
    	        aTransformer.setOutputProperty(OutputKeys.INDENT, "yes");
    	        DOMSource source = new DOMSource(doc);
    	        try {
    	            // location and name of XML file you can change as per need
    	            FileWriter fos = new FileWriter(this.personnesXmlPathFile);
    	            StreamResult result = new StreamResult(fos);
    	            aTransformer.transform(source, result);
    	        } catch (IOException e) {
    	            e.printStackTrace();
    	        }
    	    } catch (TransformerException ex) {
    	        System.out.println("Error outputting document");
    	    } catch (ParserConfigurationException ex) {
    	        System.out.println("Error building document");
    	    }
		return obj;
    }

    @Override
    public boolean delete(Personne person) {
 	   try {
 	        DocumentBuilderFactory dFact = DocumentBuilderFactory.newInstance();
 	        DocumentBuilder build = dFact.newDocumentBuilder();
 	        Document doc = build.newDocument();

 	        Element root = doc.createElement("personnes");
 	        doc.appendChild(root);
 	    	List<Personne> personnes = this.findAll();
 	    	personnes.remove(person.getIdPersonne());
 	    	int i = 0;
 	    	for (Personne p : personnes) {
 	    		i++;
     	        Element Details = doc.createElement("personne");
     	        Details.setAttribute("id", String.valueOf(i));
     	        root.appendChild(Details);
 	            Element prenom = doc.createElement("prenom");
 	            prenom.appendChild(doc.createTextNode(String.valueOf(p.getPrenom())));
 	            Element nom = doc.createElement("nom");
 	            nom.appendChild(doc.createTextNode(String.valueOf(p.getNom())));
 	            Element poids = doc.createElement("poids");
 	            poids.appendChild(doc.createTextNode(String.valueOf(p.getPoids())));
 	            Element taille = doc.createElement("taille");
 	            taille.appendChild(doc.createTextNode(String.valueOf(p.getTaille())));
 	            Element rue = doc.createElement("rue");
 	            rue.appendChild(doc.createTextNode(String.valueOf(p.getRue())));
 	            Element ville = doc.createElement("ville");
 	            ville.appendChild(doc.createTextNode(String.valueOf(p.getVille())));
 	            Element codePostal = doc.createElement("codePostal");
 	            codePostal.appendChild(doc.createTextNode(String.valueOf(p.getCodePostal())));
 	            Details.appendChild(prenom);
 	            Details.appendChild(nom);
 	            Details.appendChild(poids);
 	            Details.appendChild(taille);
 	            Details.appendChild(rue);
 	            Details.appendChild(ville);
 	            Details.appendChild(codePostal);
 	        }
 	        // Save the document to the disk file
 	        TransformerFactory tranFactory = TransformerFactory.newInstance();
 	        Transformer aTransformer = tranFactory.newTransformer();
 	        // format the XML nicely
 	        aTransformer.setOutputProperty(OutputKeys.ENCODING, "UTF-8");
 	        aTransformer.setOutputProperty(
 	                "{http://xml.apache.org/xslt}indent-amount", "4");
 	        aTransformer.setOutputProperty(OutputKeys.INDENT, "yes");
 	        DOMSource source = new DOMSource(doc);
 	        try {
 	            // location and name of XML file you can change as per need
 	            FileWriter fos = new FileWriter(this.personnesXmlPathFile);
 	            StreamResult result = new StreamResult(fos);
 	            aTransformer.transform(source, result);
 	       	return true;
 	        } catch (IOException e) {
 	            e.printStackTrace();
 	       	return false;
 	        }
 	    } catch (TransformerException ex) {
 	        System.out.println("Error outputting document");
 	       	return false;
 	    } catch (ParserConfigurationException ex) {
 	        System.out.println("Error building document");
 	       	return false;
 	    }
    }

    @Override
    public List<Personne> findAll() {
    	List<Personne> personnes = new ArrayList<Personne>();
        String filePath = "personnesXml.xml";
        File xmlFile = new File(filePath);
        DocumentBuilderFactory dbFactory = DocumentBuilderFactory.newInstance();
        DocumentBuilder dBuilder;
        try {
            dBuilder = dbFactory.newDocumentBuilder();
            Document doc = dBuilder.parse(xmlFile);
            doc.getDocumentElement().normalize();
            NodeList nodeList = doc.getElementsByTagName("personne");
            for (int i = 0; i < nodeList.getLength(); i++) {
            	Personne returnedPersonne = new Personne();
            	Element elementPersonne = (Element) nodeList.item(i);
                NodeList nodeListTemp = elementPersonne.getChildNodes();
                returnedPersonne.setIdPersonne(Integer.parseInt((elementPersonne).getAttribute("id").trim()));
                returnedPersonne.setPrenom(((NodeList) nodeListTemp).item(1).getTextContent().trim());
                returnedPersonne.setNom(((NodeList) nodeListTemp).item(3).getTextContent().trim());
                returnedPersonne.setPoids(Float.parseFloat(((NodeList) nodeListTemp).item(5).getTextContent().trim()));
                returnedPersonne.setTaille(Float.parseFloat(((NodeList) nodeListTemp).item(7).getTextContent().trim()));
                returnedPersonne.setRue(((NodeList) nodeListTemp).item(9).getTextContent().trim());
                returnedPersonne.setVille(((NodeList) nodeListTemp).item(11).getTextContent().trim());
                returnedPersonne.setCodePostal(((NodeList) nodeListTemp).item(13).getTextContent().trim());
                personnes.add(returnedPersonne);
            }
        } catch (SAXException | ParserConfigurationException | IOException e1) {
            e1.printStackTrace();
        }
        return personnes;
    }
}
