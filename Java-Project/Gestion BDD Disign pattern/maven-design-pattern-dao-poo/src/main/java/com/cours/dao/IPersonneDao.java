package com.cours.dao;

import com.cours.entities.Personne;

import java.util.List;

public interface IPersonneDao {

    public List<Personne> findAll();

    public Personne findById(int id);

    public Personne create(Personne p);

    public Personne update(Personne p);

    public boolean delete(Personne p);
}
