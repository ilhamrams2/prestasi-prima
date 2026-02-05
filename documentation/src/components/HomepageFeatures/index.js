import clsx from 'clsx';
import Heading from '@theme/Heading';
import styles from './styles.module.css';

const FeatureList = [
  {
    title: 'Dokumentasi Lengkap',
    Svg: require('@site/static/img/undraw_docusaurus_mountain.svg').default,
    description: (
      <>
        Panduan lengkap untuk arsitektur sistem, deployment production, 
        dan best practices dalam pengembangan Portal SMK Prestasi Prima.
      </>
    ),
  },
  {
    title: 'API Documentation',
    Svg: require('@site/static/img/undraw_docusaurus_tree.svg').default,
    description: (
      <>
        Swagger/OpenAPI documentation untuk semua REST API endpoints.
        Dokumentasi interaktif dengan contoh request dan response.
      </>
    ),
  },
  {
    title: 'Production Ready',
    Svg: require('@site/static/img/undraw_docusaurus_react.svg').default,
    description: (
      <>
        Deployment scripts, checklist, dan monitoring tools untuk 
        memastikan aplikasi berjalan optimal di production.
      </>
    ),
  },
];

function Feature({Svg, title, description}) {
  return (
    <div className={clsx('col col--4')}>
      <div className="text--center">
        <Svg className={styles.featureSvg} role="img" />
      </div>
      <div className="text--center padding-horiz--md">
        <Heading as="h3">{title}</Heading>
        <p>{description}</p>
      </div>
    </div>
  );
}

export default function HomepageFeatures() {
  return (
    <section className={styles.features}>
      <div className="container">
        <div className="row">
          {FeatureList.map((props, idx) => (
            <Feature key={idx} {...props} />
          ))}
        </div>
      </div>
    </section>
  );
}
