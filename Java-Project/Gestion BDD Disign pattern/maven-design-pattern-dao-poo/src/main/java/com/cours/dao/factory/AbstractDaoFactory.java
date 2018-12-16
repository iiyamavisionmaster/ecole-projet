package com.cours.dao.factory;

import com.cours.dao.IPersonneDao;
import com.cours.dao.IProjetDao;
import com.cours.dao.ITasksDao;
import com.cours.dao.IGroupsDao;

public abstract class AbstractDaoFactory
{
    public abstract IPersonneDao getPersonneDao();
    public abstract IProjetDao getProjetDao();
    public abstract IGroupsDao getGroupsDao();
    public abstract ITasksDao getTasksDao();

    public static AbstractDaoFactory getDaoFactory(FactoryType type)
    {
        switch(type)
        {
            case MANUAL_DAO:
                return (new ManualDaoFactory());
            case CSV_DAO:
                return (new CsvDaoFactory());
            case XML_DAO:
                return (new XmlDaoFactory());
            case JSON_DAO:
                return (new JsonDaoFactory());
            case SQL_DAO:
                return (new SqlDaoFactory());
            default:
                return (null);
        }
    }
}
