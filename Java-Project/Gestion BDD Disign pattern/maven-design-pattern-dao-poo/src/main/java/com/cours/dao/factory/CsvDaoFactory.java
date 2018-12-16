package com.cours.dao.factory;

import com.cours.dao.IPersonneDao;
import com.cours.dao.impl.CsvPersonneDaoImpl;

public class CsvDaoFactory extends AbstractDaoFactory
{
    @Override
    public IPersonneDao getPersonneDao()
    {
        return (new CsvPersonneDaoImpl());
    }
}
