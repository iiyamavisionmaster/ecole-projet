package com.cours.entities;

import java.util.Comparator;

public class Projet {	
	public Projet(int idProjet, String name, String coms, String groupId, String tacheId) {
		this.idProjet = idProjet;
		this.name = name;
		this.coms = coms ;
		this.groupId = groupId;
		this.tacheId = tacheId;
	}
	public Projet() {
	}
	public static Comparator<Projet> sortByNameDesc = new Comparator<Projet>() {

	public int compare(Projet a1, Projet a2) {

	   String Projet1 = a1.getName();
	   String Projet2 = a2.getName();

	   /*desc*/
	   return Projet2.compareTo(Projet1);
	}};	
	private int idProjet;
	private String name;
	private String coms;
	private String groupId;
	private String tacheId;
	
	
	
	public String gettacheId() {
		return tacheId;
	}
	public void settacheId(String tacheId) {
		this.tacheId = tacheId;
	}
	public int getIdProjet() {
		return idProjet;
	}
	public void setIdProjet(int idProjet) {
		this.idProjet = idProjet;
	}
	public String getName() {
		return name;
	}
	public void setName(String name) {
		this.name = name;
	}
	public String getComs() {
		return coms;
	}
	public void setComs(String coms) {
		this.coms = coms;
	}
	public String getGroupId() {
		return groupId;
	}
	public void setGroupId(String groupId) {
		this.groupId = groupId;
	}
	
}
