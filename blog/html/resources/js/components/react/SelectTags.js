
import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import CreatableSelect from 'react-select/creatable';

const tag_options = [];
const article_tag_options = [];


const styles = {
    menu: (styles) => Object.assign(styles, { zIndex: 1000 }),
    background: '#F5F5F5'
}

class SelectTags extends Component {
    constructor(props) {
        super(props);
        var tags = this.props.tags;
        var article_tags = this.props.article_tags;
        for (var i in tags) {
            tag_options.push({ value: tags[i]['name'], label: tags[i]['name'] });
        }
        if (article_tags !== null) {
            for (var i in article_tags) {
                article_tag_options.push({ value: article_tags[i]['name'], label: article_tags[i]['name'] });
            }
        }
    }

    // handleChange = (newValue: any, actionMeta: any) => {
    //     console.group('Value Changed');
    //     console.log(newValue);
    //     console.log(`action: ${actionMeta.action}`);
    //     console.groupEnd();
    // };


    render() {
        return (
            <div className="form-group row">
                <div className="col-sm-12">
                    <CreatableSelect
                        isMulti
                        isSearchable
                        // onChange={this.handleChange}
                        defaultValue={article_tag_options}
                        name="tags[]"
                        options={tag_options}
                        styles={styles}
                        placeholder="タグ"
                    />
                </div>
            </div>
        );
    }
}


if (document.getElementById('select_tags')) {
    let tags = JSON.parse(document.getElementById('select_tags').getAttribute('tags'));
    let article_tags = JSON.parse(document.getElementById('select_tags').getAttribute('article_tags'));
    ReactDOM.render(<SelectTags tags={tags} article_tags={article_tags} />, document.getElementById('select_tags'));
}