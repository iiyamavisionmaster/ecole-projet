package com.cours.entities;

import java.util.Comparator;

public class Personne {	
	public Personne(int idPersonne, String nom, String prenom, double poids, double taille, String rue, String ville,
			String codePostal) {
		this.idPersonne = idPersonne;
		this.nom = nom;
		this.prenom = prenom;
		this.poids = poids;
		this.taille = taille;
		this.rue = rue;
		this.ville = ville;
		this.codePostal = codePostal;
	}
	public Personne() {
	}
	public static Comparator<Personne> sortByFirstNameDesc = new Comparator<Personne>() {

	public int compare(Personne a1, Personne a2) {

	   String personne1 = a1.getPrenom();
	   String personne2 = a2.getPrenom();

	   /*desc*/
	   return personne2.compareTo(personne1);
	}};
	public static Comparator<Personne> sortByFirstNameAsc = new Comparator<Personne>() {

	public int compare(Personne a1, Personne a2) {

	   String personne1 = a1.getPrenom();
	   String personne2 = a2.getPrenom();

	   /*desc*/
	   return personne1.compareTo(personne2);
	}};
	public static Comparator<Personne> sortByLastNameDesc = new Comparator<Personne>() {

	public int compare(Personne a1, Personne a2) {

	   String personne1 = a1.getNom();
	   String personne2 = a2.getNom();

	   /*desc*/
	   return personne2.compareTo(personne1);
	}};
	public static Comparator<Personne> sortByLastNameAsc = new Comparator<Personne>() {

	public int compare(Personne a1, Personne a2) {

	   String personne1 = a1.getNom();
	   String personne2 = a2.getNom();

	   /*asc*/
	   return personne1.compareTo(personne2);
	}};
  
	private int idPersonne;
	private String nom;
	private String prenom;
	private double poids;
	private double taille;
	private String rue;
	private String ville;
	private String codePostal;
	
	
	
	public double getImc() {
		return this.poids / (this.taille*this.taille);
	}	
	public boolean isMaigre() {
		if(this.getImc() > 16.5 && this.getImc() < 18.5) {
			return true;
		}else {
			return false;
		}
	}	
	public boolean isSurPoids() {
		if(this.getImc() > 25 && this.getImc() < 30) {
			return true;
		}else {
			return false;
		}
	}	
	public boolean isObese() {
		if(this.getImc() > 30) {
			return true;
		}else {
			return false;
		}
	}
	public int getIdPersonne() {
		return idPersonne;
	}
	public void setIdPersonne(int idPersonne) {
		this.idPersonne = idPersonne;
	}
	public String getNom() {
		return nom;
	}
	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((codePostal == null) ? 0 : codePostal.hashCode());
		result = prime * result + idPersonne;
		result = prime * result + ((nom == null) ? 0 : nom.hashCode());
		long temp;
		temp = Double.doubleToLongBits(poids);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		result = prime * result + ((prenom == null) ? 0 : prenom.hashCode());
		result = prime * result + ((rue == null) ? 0 : rue.hashCode());
		temp = Double.doubleToLongBits(taille);
		result = prime * result + (int) (temp ^ (temp >>> 32));
		result = prime * result + ((ville == null) ? 0 : ville.hashCode());
		return result;
	}
	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		Personne other = (Personne) obj;
		if (codePostal == null) {
			if (other.codePostal != null)
				return false;
		} else if (!codePostal.equals(other.codePostal))
			return false;
		if (idPersonne != other.idPersonne)
			return false;
		if (nom == null) {
			if (other.nom != null)
				return false;
		} else if (!nom.equals(other.nom))
			return false;
		if (Double.doubleToLongBits(poids) != Double.doubleToLongBits(other.poids))
			return false;
		if (prenom == null) {
			if (other.prenom != null)
				return false;
		} else if (!prenom.equals(other.prenom))
			return false;
		if (rue == null) {
			if (other.rue != null)
				return false;
		} else if (!rue.equals(other.rue))
			return false;
		if (Double.doubleToLongBits(taille) != Double.doubleToLongBits(other.taille))
			return false;
		if (ville == null) {
			if (other.ville != null)
				return false;
		} else if (!ville.equals(other.ville))
			return false;
		return true;
	}
	@Override
	public String toString() {
		return "Personne [idPersonne=" + idPersonne + ", nom=" + nom + ", prenom=" + prenom + ", poids=" + poids
				+ ", taille=" + taille + ", rue=" + rue + ", ville=" + ville + ", codePostal=" + codePostal + "]";
	}
	public void setNom(String nom) {
		this.nom = nom;
	}
	public String getPrenom() {
		return prenom;
	}
	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}
	public double getPoids() {
		return poids;
	}
	public void setPoids(double poids) {
		this.poids = poids;
	}
	public double getTaille() {
		return taille;
	}
	public void setTaille(double taille) {
		this.taille = taille;
	}
	public String getRue() {
		return rue;
	}
	public void setRue(String rue) {
		this.rue = rue;
	}
	public String getVille() {
		return ville;
	}
	public void setVille(String ville) {
		this.ville = ville;
	}
	public String getCodePostal() {
		return codePostal;
	}
	public void setCodePostal(String codePostal) {
		this.codePostal = codePostal;
	}
	
}
